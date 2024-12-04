<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleTranslation extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'description',
        'created_by',
        'updated_by',
        'status',
    ];

    // Define the casts for any attributes that need to be cast to a specific type
    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    // Define the relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
