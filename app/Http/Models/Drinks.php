<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    //
    protected $table = 'drinks';

    protected $fillable = ['name', 'value'];
}
