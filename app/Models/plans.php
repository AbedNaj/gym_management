<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plans extends Model
{
    /** @use HasFactory<\Database\Factories\PlansFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'duration_in_days',
        'price',
        'gym_id'
    ];
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
