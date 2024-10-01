<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'surface',
        'chambre',
        'nbre_piece',
        'etage',
        'prix',
        'ville',
        'adresse',
        'code_postal',
        'vendue'
    ];

    public function options(): BelongsToMany
    {
        return $this->BelongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->titre);
    }
}
