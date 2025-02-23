<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gym_id' => $this->gym_id,
        ];
    }
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

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
