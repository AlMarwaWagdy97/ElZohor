<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JopApplication extends Model
{
    use HasFactory;

    protected $fillable =
        ['name',
            'email',
            'mobile',
            'address',
            'file',
            'updated_by',
            'status',
            'career_id'];

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }

}
