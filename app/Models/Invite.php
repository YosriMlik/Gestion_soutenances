<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invite extends Model
{
    use HasFactory;

    protected $table = 'invite';

    public function soutenances(): BelongsToMany
    {
        return $this->BelongsToMany(Soutenance::class, 'invite_soutenance');
    }
}
