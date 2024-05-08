<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jury extends Model
{
    use HasFactory;

    protected $table = 'jury';

    public function soutenances(): BelongsToMany
    {
        return $this->BelongsToMany(Soutenance::class, 'jury_soutenance')->withPivot("role");
    }
    /*public static function boot()
    {
        parent::boot();

        static::deleting(function ($jury) {
            $jury->pfe()->detach(); // Delete associated users
        });
    }*/
}
