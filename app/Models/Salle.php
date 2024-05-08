<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salle';

    public function soutenances(): HasMany
    {
        return $this->HasMany(Soutenance::class, 'specialite_soutenance');
    }
}
