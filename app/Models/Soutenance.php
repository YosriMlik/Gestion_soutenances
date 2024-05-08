<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Soutenance extends Model
{
    use HasFactory;

    protected $table = 'soutenance';

    public function pfe(): HasOne
    {
        return $this->hasOne(Pfe::class);
    }

    public function etudiants(): HasMany
    {
        return $this->HasMany(Etudiant::class);
    }

    public function specialite(): BelongsTo
    {
        return $this->belongsTo(Specialite::class);
    }

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class);
    }

    public function jurys(): BelongsToMany
    {
        return $this->BelongsToMany(Jury::class, 'jury_soutenance')->withPivot("role");
    }

    public function invites(): BelongsToMany
    {
        return $this->BelongsToMany(Invite::class, 'invite_soutenance');
    }
}
