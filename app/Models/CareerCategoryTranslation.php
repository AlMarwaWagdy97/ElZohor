<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = "career_categories_translations";
    protected $fillable = [
        'career_category_id',
        'locale',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];

}
