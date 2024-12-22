<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    protected $fillable = [
        'category_id',
        'image',
        'sort',
        'status',
        'feature',
    ];

    protected $translationForignKey = 'product_id';

    public $translatedAttributes = [
        'product_id',
        'locale',
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key'
    ];

    public function trans()
    {
        return $this->hasMany(ProductTranslation::class, 'product_id', 'id');
    }
    public function transNow()
    {
        return $this->hasOne(ProductTranslation::class, 'product_id', 'id')->where('locale' , app()->getLocale());
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
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
