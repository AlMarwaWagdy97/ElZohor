<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use HasFactory;

    use HasFactory, Translatable;

    protected $fillable = [

        'image',
        'sort',
        'status',
        'feature',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            // Delete all related comments
            $post->trans()->delete();
        });




    }

    protected $translationForeignKey = 'insurance_id';
    public $translatedAttributes = [
        'insurance_id',
        'locale',
        'title',
        'slug',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_key',
    ];


    public function trans(){
        return $this->hasMany(InsuranceTranslation::class, 'insurance_id', 'id');
    }

    // Scopes ----------------------------
    public function scopeActive($query){
        return $query->where('status', 1);
    }
    public function scopeFeature($query){
        return $query->where('feature', 1);
    }
    public function scopeLang($query){
        return $query->trans->where('locale',  app()->getLocale())->first();
    }


}
