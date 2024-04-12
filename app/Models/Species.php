<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'origin',
        'habitat',
        'sighting_year',
        'risk_level',
        'species_image'

    ];

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public function habitat()
    {
        return $this->belongsToMany(Habitat::class)->withTimestamps();
    }
}
