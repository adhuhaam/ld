<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code_id',
        'name',
        'phone',
        'consent',
        'viber_join_cta_shown',
    ];

    protected $casts = [
        'consent' => 'boolean',
        'viber_join_cta_shown' => 'boolean',
    ];

    public function qrCode(): BelongsTo
    {
        return $this->belongsTo(QrCode::class);
    }

    public function winners(): HasMany
    {
        return $this->hasMany(Winner::class);
    }
}
