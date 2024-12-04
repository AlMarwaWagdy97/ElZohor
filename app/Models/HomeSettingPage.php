<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\HomeSettingPageTranslation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeSettingPage extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    protected $fillable = ['title_section', 'image', 'status', 'featured', 'url', 'created_by', 'updated_by', 'num_of_items',
        'button_featured'
    ];

    public $translatedAttributes = ['home_setting_id', 'locale', 'title', 'description', 'sub_title' , 'button_title'];
    // foreign key
    protected $translationForeignKey = 'home_setting_id';

    public function trans()
    {
        return $this->hasMany(HomeSettingPageTranslation::class, 'home_setting_id');
    }


    // Scopes ----------------------------
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
