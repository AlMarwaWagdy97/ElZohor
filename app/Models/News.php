<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Translatable;


    protected $fillable = [
        'image',
//        'title',
//        'description',
        'status',
        'feature',
        'sort',

        'created_by',
        'updated_by',
    ];

    protected $translationForeignKey = 'new_id';
    public $translatedAttributes = [
        'new_id',
        'locale',
        'title',
        'slug',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_key',
    ];


    public function trans()
    {
        return $this->hasMany(NewsTranslation::class, 'new_id', 'id');
    }

    public function transNow()
    {
        return $this->hasOne(NewsTranslation::class, 'new_id', 'id')->where('locale', app()->getLocale());
    }


    // Scopes ----------------------------

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeFeatured($query)
    {
        return $query->where('feature', 1);
    }

}
