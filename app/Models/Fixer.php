<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixer extends Model
{
    protected $fillable = [
        'name',
        'password',
        'email',
        'City',
        'profession',
        'imagePath',
    ];

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
}
