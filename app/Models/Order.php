<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

