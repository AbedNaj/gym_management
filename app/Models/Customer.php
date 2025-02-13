<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $guarded = [];
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
    public function registration()
    {
        return $this->hasMany(registration::class);
    }

    public function debt()
    {
        return $this->hasMany(debts::class);
    }
}
