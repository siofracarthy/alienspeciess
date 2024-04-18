<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date_of_publish',
        'description',
        'guide_url',
        'guide_image',
        'species_id'
    ];


    public function species(){
        return $this->belongsTo(Species::class);
    }
}
