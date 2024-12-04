<?php

namespace App\Models;


use App\Models\CategoriesTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'image',
        'level',
        'sort',
        'feature',
        'status',
        'meta'
    ];

    protected $translationForeignKey = 'category_id';

    public $translatedAttributes = [
        'category_id',
        'locale',
        'title',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];

    public function trans()
    {
        return $this->hasMany(CategoriesTranslation::class, 'category_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }



    // Scopes ----------------------------
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeFeature($query)
    {
        return $query->where('feature', 1);
    }
}
