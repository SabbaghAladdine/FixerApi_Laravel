<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'password',
        'email',
        'City',
        'imagePath',
    ];

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
}