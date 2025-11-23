<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">

                {{-- LOGO --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="/img/logo2.png"
                         alt="Logo"
                         class="h-12 w-auto ml-2">
                </a>

                {{-- LINKS --}}
                <div class="hidden sm:flex space-x-8 ml-12">

                    <x-admin-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        Panel
                    </x-admin-nav-link>

                    <x-admin-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                        Productos
                    </x-admin-nav-link>

                    <x-admin-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                        Usuarios
                    </x-admin-nav-link>

                    <x-admin-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                        Roles
                    </x-admin-nav-link>

                </div>
            </div>

            {{-- USUARIO --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm text-gray-600 hover:text-gray-800">
                            <div>{{ Auth::user()->name }}</div>

                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1-414z"
                                    clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar Sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- HAMBURGUESA --}}
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 text-gray-500 hover:bg-gray-100 rounded-md">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

</nav>
