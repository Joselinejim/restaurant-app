<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

{
class Order extends Model
{
    protected $fillable = [
        'table',
        'user_id',
        'status',
        'cancellation_reason',
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}

}
