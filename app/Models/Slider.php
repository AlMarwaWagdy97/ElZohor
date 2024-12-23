<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;
    use Translatable;
    public $translatedAttributes = ['title', 'slug', 'sub_title', 'sub_description', 'description', 'slider_id', 'locale',];
    protected $fillable = [
        'url',
        'image',
        'sort',
        'status',
        'created_by',
        'updated_by',
    ];


    protected $translationForeignKey = 'slider_id';
    
    public function trans()
    {
        return $this->hasMany(SliderTranslation::class, 'slider_id', 'id');
    }


    // Scopes ---------------------------------------------------------------------------------
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
