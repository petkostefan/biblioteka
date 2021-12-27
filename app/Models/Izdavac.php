<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izdavac extends Model
{
    use HasFactory;

    public function knjige()
    {
        $this->hasMany(Knjiga::class);
    }
}
