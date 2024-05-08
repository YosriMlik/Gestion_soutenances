<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialite extends Model
{
    use HasFactory;

    protected $table = 'specialite';

    public function etudiants(): HasMany
    {
        return $this->HasMany(Etudiant::class, 'specialite_id');
    }

    public function soutenances(): HasMany
    {
        return $this->HasMany(Soutenance::class, 'specialite_id');
    }

    public function pfes(): HasMany
    {
        return $this->HasMany(Pfe::class, 'specialite_id');
    }
}
