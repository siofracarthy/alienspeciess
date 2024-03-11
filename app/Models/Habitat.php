<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'climate',
        'terrain',
        'flora',
        'fauna',
        'species_image'

    ];

    public function species()
    {
        return $this->belongsToMany(Species::class)->withTimestamps();
    }


}
