<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'slug', 'type', 'description', 'review_id', 'locale'];

    protected $translationForeignKey = 'review_id';

    protected $fillable = [
        'sort',
        'image',
        'feature',
        'status',
        'created_by',
        'updated_by',
    ];



    public function trans()
    {
        return $this->hasMany(ReviewsTranslation::class, 'review_id', 'id');
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
