<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerTranslation extends Model
{
    use HasFactory;
    protected $table = "careers_translations";

    protected $fillable = [
        'career_id',
        'description',
        'locale',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',

    ];

}
