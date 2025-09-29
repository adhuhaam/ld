<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code_id',
        'entry_id',
        'prize_id',
        'announced_at',
        'notes',
    ];

    protected $casts = [
        'announced_at' => 'datetime',
    ];

    public function qrCode(): BelongsTo
    {
        return $this->belongsTo(QrCode::class);
    }

    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }

    public function prize(): BelongsTo
    {
        return $this->belongsTo(Prize::class);
    }

    public function scopeAnnounced($query)
    {
        return $query->whereNotNull('announced_at');
    }

    public function scopePending($query)
    {
        return $query->whereNull('announced_at');
    }
}
