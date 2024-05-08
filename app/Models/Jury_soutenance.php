<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jury_soutenance extends Pivot
{
    use HasFactory;

    protected $table = 'jury_soutenance';
    protected $fillable = ['role'];

    public function jury(): HasOne
    {
        return $this->hasOne(Jury::class);
    }

    public function soutenance(): HasOne
    {
        return $this->hasOne(Soutenance::class);
    }
}
