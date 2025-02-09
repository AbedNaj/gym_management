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
            self::STATUS_PENDING,
            self::STATUS_ACTIVE,
            self::STATUS_EXPIRED,
            self::STATUS_CANCELED,
            self::STATUS_FREZZED
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
}
