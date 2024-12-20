<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $table = 'products_translations';

    protected $fillable = [
        'product_id',
        'locale',
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];
}
