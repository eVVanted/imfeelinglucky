<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int                     $id
 * @property string                  $phone
 * @property string                  $name
 *
 *  Relations
 *
 * @property Collection|AccessLink[] access_links
 */
class User extends Model
{

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    public function access_links(): HasMany
    {
        return $this->hasMany(AccessLink::class);
    }

}
