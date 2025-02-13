<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debts extends Model
{
    /** @use HasFactory<\Database\Factories\DebtsFactory> */
    use HasFactory;
    const STATUS_PAID = 'PAID';
    const STATUS_UNPAID = 'UNPAID';
    public static function getStatusOptions()
    {
        return [
            self::STATUS_UNPAID,
            self::STATUS_PAID,

        ];
    }
    protected $fillable = [
        'debt_amount',
        'paid_amount',
        'customer_id',
        'gym_id',
        'status',
        'debt_date',
        'last_payment_date',
        'details'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function registration()
    {
        return $this->belongsTo(registration::class);
    }
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
