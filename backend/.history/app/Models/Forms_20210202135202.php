<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Forms extends Model
{
    protected $fillable1 = ['name', 'logo', 'banner', 'port', 'lat', 'long', 'ranking', 'street', 'house_number', 'zipcode', 'city',
    'state', 'country', 'phone_countrycode', 'phone_number', 'email', 'website', 'payment_method', 'payment_method', 'iban_name',
    'iban_number', 'bic_swift', 'contact_name', 'category', 'subcategory', 'language', 'opening_days', 'opening_hours'];

    protected $fillable2 = ['opening_days', 'opening_hours'];
}
