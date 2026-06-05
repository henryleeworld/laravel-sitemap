<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['no', 'name', 'created_at', 'updated_at', 'deleted_at'])]
#[Table('products')]
class Product extends Model
{
    use SoftDeletes;
}
