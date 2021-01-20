<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'shipping_address_id',
        'billing_address_id',
        'user_id',
        'shipping_option',
        'payment_option',
        'enable_tax',
        'tax_percentage',
        'order_status_id',
        'order_note',
        'order_date',
        'rewards',
        'discount',
        'tax_amount',
      'shipping_amount'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'order_date',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('qty',
                'price',
                'discount',
                'tax_amount',
                'image_name',
                'total_color_price',
                'total_frame_price',
                'front',
                'back',
                'pocket',
                'color_no',
                'quantity_xs',
                'quantity_s',
                'quantity_m',
                'quantity_xl',
                'quantity_2xl',
                'quantity_3xl',
                'interest_logo')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderReturnRequest()
    {
        return $this->hasOne(OrderReturnRequest::class);
    }

    public function getShippingAddressAttribute()
    {
        $shippingAddress = Address::findOrFail($this->attributes['shipping_address_id']);

        return $shippingAddress;
    }

    public function getOrderStatusTitleAttribute()
    {
        return $this->orderStatus->title;
    }

    public function getBillingAddressAttribute()
    {
        $address = Address::findorfail($this->attributes['billing_address_id']);

        return $address;
    }

    public function getOrderDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y/m/d');
    }

    public function setOrderDateAttribute($value)
    {
        $this->attributes['order_date'] = isValidTimestamp($value) ? $value : Carbon::createFromFormat('Y/m/d', $value)->toDateTimeString();
    }
}
