<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string                   $ulid
 * @property int                      $user_id
 * @property Carbon                   $expires_at
 *
 * Relations
 *
 * @property User                     user
 * @property Collection|LuckyResult[] lucky_results
 */
class AccessLink extends Model
{

    public const EXPIRATION_DAYS = 7;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $primaryKey = 'ulid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lucky_results(): HasMany
    {
        return $this->hasMany(LuckyResult::class, 'access_link_ulid', 'ulid');
    }

    public function isActive(): bool
    {
        return $this->expires_at->gt(now());
    }

    public function deactivate(): void
    {
        $this->expires_at = now();
        $this->save();
    }

}
