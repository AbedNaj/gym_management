<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory;
    const STATUS_PENDING = 'pedning';
    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';
    const STATUS_CANCELED = 'canceled';
    const STATUS_FREZZED = 'freezed';

    public static function getStatusOptions()
    {
        return [
            'active'   => __('registration.active'),
            'expired'  => __('registration.expired'),
            'canceled' => __('registration.canceled'),
            'freezed'  => __('registration.freezed'),
        ];
    }

    protected $guarded = ['id'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function plans()
    {
        return $this->belongsTo(plans::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function debt()
    {
        return $this->hasOne(debts::class);
    }
    public function freeze()
    {
        return $this->hasOne(Freeze::class);
    }
}
