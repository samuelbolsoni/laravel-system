<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    //
    protected $table = 'pizzas';

    protected $fillable = ['name'];
}
