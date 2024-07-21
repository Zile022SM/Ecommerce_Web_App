<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name','discount','valid_until'];

    /**
     * Convert the coupon to uppercase
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    /**
     * Chek if coupon is valid
     */

    public function isValid()
    {
        return $this->valid_until > Carbon::now();
    }
}
