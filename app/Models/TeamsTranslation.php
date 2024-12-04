<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsTranslation extends Model
{
    use HasFactory;

    protected $table = 'teams_translations';

    protected $fillable = [
        'team_id',
        'locale',
        'name',
        'description',
        'job_title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];
}
