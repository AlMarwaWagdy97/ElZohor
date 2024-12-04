<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_id',
        'title',
        'slug',
        'description',
        'locale',
        'meta_title',
        'meta_description',
        'meta_key',
    ];

}
