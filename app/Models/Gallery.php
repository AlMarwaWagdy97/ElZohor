<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'slug', 'description', 'gallery_id',
        'locale', 'meta_title', 'meta_description', 'meta_key'];

    protected $fillable = [
        'gallery_id',
        'image',
        'sort',
        'feature',
        'status',
        'created_by',
        'updated_by',
    ];


    protected $translationForeignKey = 'gallery_id';


    public function trans()
    {
        return $this->hasMany(GalleryTranslation::class, 'gallery_id', 'id');
    }


   

    // Scopes ---------------------------------------------------------------------------------
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFeature($query)
    {
        return $query->where('feature', 1);
    }
}
