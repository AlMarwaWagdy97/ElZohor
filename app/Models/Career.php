<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = "careers";
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'status',

    ];


    public function category()
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }


    /*********scope   *****/

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
