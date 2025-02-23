<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function registration()
    {
        return $this->belongsTo(registration::class);
    }
    public function debt()
    {
        return $this->belongsTo(debts::class);
    }
}
