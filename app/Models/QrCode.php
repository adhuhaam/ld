<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'lucky_id',
        'label',
        'location_hint',
        'prize_id',
        'is_winner',
        'status',
    ];

    protected $casts = [
        'is_winner' => 'boolean',
    ];

    public function scans(): HasMany
    {
        return $this->hasMany(Scan::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }

    public function prize(): BelongsTo
    {
        return $this->belongsTo(Prize::class);
    }

    public function winners(): HasMany
    {
        return $this->hasMany(Winner::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeWinners($query)
    {
        return $query->where('is_winner', true);
    }

    public function getQrUrlAttribute(): string
    {
        return url("/s/{$this->code}");
    }
}
