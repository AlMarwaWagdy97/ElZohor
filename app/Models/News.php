<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
