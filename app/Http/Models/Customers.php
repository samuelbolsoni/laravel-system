<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = ['name', 'email', 'address', 'district', 'city', 'reference', 'phone', 'cellphone', 'whatsapp'];
}
