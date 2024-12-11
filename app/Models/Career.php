<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory , Translatable;

    protected $table = "careers";
    protected $fillable = [
        'category_id',
        'status',
        'feature',
        'sort',


    ];

    protected $translationForeignKey = 'career_id';
    public $translatedAttributes = [
        'career_id',
        'locale',
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_key',
    ];

    public function trans(){
        return $this->hasMany(CareerTranslation::class, 'career_id', 'id');
    }

    public function transNow(){
        return $this->hasOne(CareerTranslation::class, 'career_id', 'id')->where('locale' , app()->getLocale());
    }



    public function category()
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }


    /*********scope   *****/

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFeatured($query)
    {
        return $query->where('feature', 1);
    }

}
