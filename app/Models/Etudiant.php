<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant';

    public function specialite(): BelongsTo
    {
        return $this->belongsTo(Specialite::class);
    }
    public function soutenance(): BelongsTo
    {
        return $this->belongsTo(Soutenance::class);
    }
}
