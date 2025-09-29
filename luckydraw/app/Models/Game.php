<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'type',
        'config',
        'is_active',
        'difficulty_level',
        'max_attempts',
        'time_limit',
        'min_score',
    ];

    protected $casts = [
        'config' => 'array',
        'is_active' => 'boolean',
        'difficulty_level' => 'integer',
        'max_attempts' => 'integer',
        'time_limit' => 'integer',
        'min_score' => 'integer',
    ];

    /**
     * Get all game sessions for this game
     */
    public function gameSessions(): HasMany
    {
        return $this->hasMany(GameSession::class);
    }

    /**
     * Scope for active games only
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for games by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the game URL
     */
    public function getGameUrlAttribute(): string
    {
        return url("/game/{$this->slug}");
    }

    /**
     * Get formatted difficulty
     */
    public function getDifficultyTextAttribute(): string
    {
        $levels = [
            1 => 'Easy',
            2 => 'Medium',
            3 => 'Hard',
            4 => 'Expert',
            5 => 'Master'
        ];

        return $levels[$this->difficulty_level] ?? 'Unknown';
    }

    /**
     * Check if game has time limit
     */
    public function hasTimeLimit(): bool
    {
        return $this->time_limit !== null && $this->time_limit > 0;
    }

    /**
     * Get time limit in minutes
     */
    public function getTimeLimitMinutesAttribute(): float
    {
        return $this->time_limit ? round($this->time_limit / 60, 1) : 0;
    }
}