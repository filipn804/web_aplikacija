<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjige extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title',
        'publisher',
        'price',
        'language',
        'description'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
