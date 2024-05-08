<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Pfe extends Model
{
    use HasFactory;

    protected $table = 'pfe';

    public function soutenance(): BelongsTo
    {
        return $this->belongsTo(Soutenance::class, 'pfe_id');
    }
    public function specialite(): BelongsTo
    {
        return $this->belongsTo(Specialite::class);
    }
}
