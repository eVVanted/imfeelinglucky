<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $access_link_ulid
 * @property int    $roll
 * @property int    $amount
 */
class LuckyResult extends Model
{

    public const MINIMUM_ROLL = 1;
    public const MAXIMUM_ROLL = 1000;
    public const HISTORY_LENGTH = 3;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    public function isWin(): bool
    {
        return $this->amount > 0;
    }

    public function getAmountAsMoney(): string
    {
        return number_format($this->amount / 100, 2, '.', ' ');
    }

}
