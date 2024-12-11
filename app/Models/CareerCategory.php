<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCategory extends Model
{
    use HasFactory , Translatable;
    protected $fillable = [
        'status',
        'feature',
        'sort',
    ];






    protected $translationForeignKey = 'career_category_id';
    public $translatedAttributes = [
        'career_category_id',
        'locale',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];


    public function trans(){
        return $this->hasMany(CareerCategoryTranslation::class, 'career_category_id', 'id');
    }

    public function transNow(){
        return $this->hasOne(CareerCategoryTranslation::class, 'career_category_id', 'id')->where('locale' , app()->getLocale());
    }



    /***********scopes*********/

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function scopeFeatured($query)
    {
        return $query->where('feature', 1);
    }

}
