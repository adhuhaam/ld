<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'action',
        'target_type',
        'target_id',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function getTargetAttribute()
    {
        if (!$this->target_type || !$this->target_id) {
            return null;
        }

        $modelClass = 'App\\Models\\' . ucfirst($this->target_type);
        
        if (class_exists($modelClass)) {
            return $modelClass::find($this->target_id);
        }

        return null;
    }
}
