<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Notifications\UserPasswordGenerated;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->orderBy('id', 'asc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
        ]);

        // Generar contraseña aleatoria
        $plainPassword = Str::random(8);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($plainPassword),
        ]);

        // Asignar rol
        $user->assignRole($request->role);

        // 📩 ENVIAR CORREO AL USUARIO
        $user->notify(new UserPasswordGenerated($plainPassword));

        // Mostrar mensaje al admin
        return redirect()->route('admin.users.index')
            ->with('success', "Usuario creado correctamente. La contraseña fue enviada al correo del usuario.");
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado');
    }
    public function generatePassword(User $user)
    {
        // Generar nueva contraseña
        $newPassword = Str::random(8);

        // Guardarla cifrada
        $user->update([
            'password' => bcrypt($newPassword),
        ]);

        // Enviar correo al usuario
        $user->notify(new UserPasswordGenerated($newPassword));

        // Mostrar mensaje al admin
        return redirect()->back()
            ->with('success', "Nueva contraseña generada y enviada al correo del usuario.");
    }

}
