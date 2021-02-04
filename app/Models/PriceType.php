<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class PriceType extends Model
{
    use CrudTrait;

    protected $fillable = ['name'];
}
