<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory , Translatable;
    protected $fillable = [
        'image',
        'title',
        'feature',
        'sort',

        'description',
        'status',
        'created_by',
        'updated_by',

    ];


    protected $translationForeignKey = 'blog_id';
    public $translatedAttributes = [
        'blog_id',
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
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'id');
    }

    public function transNow()
    {
        return $this->hasOne(BlogTranslation::class, 'blog_id', 'id')->where('locale', app()->getLocale());
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeFeatured($query)
    {
        return $query->where('feature', 1);
    }


    }
