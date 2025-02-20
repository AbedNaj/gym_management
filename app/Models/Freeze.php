<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freeze extends Model
{
    /** @use HasFactory<\Database\Factories\FreezeFactory> */
    use HasFactory;

    protected $guarded = [];
    public function registration()
    {

        return  $this->belongsTo(registration::class);
    }
    public function gym()
    {

        return  $this->belongsTo(Gym::class);
    }
}
