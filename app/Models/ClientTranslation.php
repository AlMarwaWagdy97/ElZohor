<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
    use HasFactory;

    protected $table = 'client_translations';

    protected $fillable = [
        'client_id',
        'locale',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
    ];
}
