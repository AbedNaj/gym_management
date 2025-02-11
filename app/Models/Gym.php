<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    /** @use HasFactory<\Database\Factories\GymFactory> */
    use HasFactory;

    protected $fillable = [
        'gymName',
        'phone',
        'location'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function plans()
    {
        return $this->hasMany(plans::class);
    }
    public function registration()
    {
        return $this->hasMany(registration::class);
    }
}
