<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserScript extends Model
{
    use HasFactory;

    protected $fillable = [
        'script',
        'place',
        'created_by',
        'updated_by',
        'status',
    ];




    public function createdBy()
    {
        return $this->belongsTo(User::class , 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class , 'updated_by');
    }


    /************scopes********************/
    public function scopeActive($query){
        return $query->where('status','>' , 0);
    }


}
