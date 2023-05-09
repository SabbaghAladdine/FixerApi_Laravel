<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Description',
        'imagePath',
        'client_id',
        'fixer_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function fixer()
    {
        return $this->belongsTo(Fixer::class);
    }
}
