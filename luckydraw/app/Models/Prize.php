<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'sponsor',
        'value_amount',
        'value_currency',
        'status',
    ];

    protected $casts = [
        'value_amount' => 'decimal:2',
    ];

    public function qrCodes(): HasMany
    {
        return $this->hasMany(QrCode::class);
    }

    public function winners(): HasMany
    {
        return $this->hasMany(Winner::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFormattedValueAttribute(): string
    {
        if (!$this->value_amount) {
            return 'TBA';
        }
        
        return $this->value_amount . ' ' . $this->value_currency;
    }
}
