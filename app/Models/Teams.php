<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory,  Translatable, SoftDeletes;

    protected $fillable = [
        'image',
        'sort',
        'feature',
        'status',
        'is_directors'
    ];

    protected $translationForeignKey = 'team_id';

    public $translatedAttributes = [
        'team_id',
        'locale',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_key',
    ];

    public function trans()
    {
        return $this->hasMany(TeamsTranslation::class, 'team_id', 'id');
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

    public function scopeDirectors($query)
    {
        return $query->where('is_directors', 1);
    }


}
