<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'address1', 'province', 'district','customer_id'];

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'user_id', 'customer_id');
    }
}
