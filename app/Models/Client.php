<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    protected $fillable = [
        'image',
        'sort',
        'feature',
        'status'
    ];


    protected $translationForeignKey = 'client_id';

    public $translatedAttributes = [
        'client_id',
        'locale',
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'meta_key',
    ];


    public function trans()
    {
        return $this->hasMany(ClientTranslation::class, 'client_id', 'id');
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
