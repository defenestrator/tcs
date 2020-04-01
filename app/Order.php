<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'subtotal',
        'coupon_id',
        'shipping_price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => EfficientUuid::class,
        'user_id' => 'integer',
        'subtotal' => 'integer',
        'coupon_id' => 'integer',
        'shipping_price' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function subtotal()
    {
        return $this->belongsTo(\App\Subtotal::class);
    }

    public function coupon()
    {
        return $this->belongsTo(\App\Coupon::class);
    }
}
