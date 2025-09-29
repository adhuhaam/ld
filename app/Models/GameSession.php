<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class GameSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code_id',
        'game_id',
        'session_id',
        'name',
        'phone',
        'consent',
        'game_data',
        'final_score',
        'attempts_used',
        'completed',
        'qualified_for_prize',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'game_data' => 'array',
        'consent' => 'boolean',
        'completed' => 'boolean',
        'qualified_for_prize' => 'boolean',
        'final_score' => 'integer',
        'attempts_used' => 'integer',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->session_id)) {
                $model->session_id = Str::random(32);
            }
        });
    }

    /**
     * Get the QR code that triggered this session
     */
    public function qrCode(): BelongsTo
    {
        return $this->belongsTo(QrCode::class);
    }

    /**
     * Get the game that was played
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Scope for completed sessions
     */
    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    /**
     * Scope for sessions that qualified for prizes
     */
    public function scopeQualifiedForPrize($query)
    {
        return $query->where('qualified_for_prize', true);
    }

    /**
     * Scope for sessions by game type
     */
    public function scopeByGameType($query, $type)
    {
        return $query->whereHas('game', function ($q) use ($type) {
            $q->where('type', $type);
        });
    }

    /**
     * Mark session as started
     */
    public function markAsStarted(): void
    {
        $this->update(['started_at' => now()]);
    }

    /**
     * Mark session as completed
     */
    public function markAsCompleted(int $score, array $gameData = []): void
    {
        $this->update([
            'final_score' => $score,
            'game_data' => $gameData,
            'completed' => true,
            'completed_at' => now(),
            'qualified_for_prize' => $this->checkQualification($score),
        ]);
    }

    /**
     * Check if score qualifies for prizes
     */
    protected function checkQualification(int $score): bool
    {
        if (!$this->game->min_score) {
            return true; // No minimum score requirement
        }

        return $score >= $this->game->min_score;
    }

    /**
     * Increment attempts used
     */
    public function incrementAttempts(): void
    {
        $this->increment('attempts_used');
    }

    /**
     * Check if player has remaining attempts
     */
    public function hasRemainingAttempts(): bool
    {
        return $this->attempts_used < $this->game->max_attempts;
    }

    /**
     * Get remaining attempts
     */
    public function getRemainingAttemptsAttribute(): int
    {
        return max(0, $this->game->max_attempts - $this->attempts_used);
    }

    /**
     * Get session duration
     */
    public function getDurationAttribute(): ?int
    {
        if (!$this->started_at || !$this->completed_at) {
            return null;
        }

        return $this->completed_at->diffInSeconds($this->started_at);
    }

    /**
     * Get formatted duration
     */
    public function getFormattedDurationAttribute(): string
    {
        if (!$this->duration) {
            return 'N/A';
        }

        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;

        if ($minutes > 0) {
            return "{$minutes}m {$seconds}s";
        }

        return "{$seconds}s";
    }
}