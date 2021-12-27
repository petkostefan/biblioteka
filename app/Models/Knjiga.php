<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;


    public function izdavac()
    {
        $this->belongsTo(Izdavac::class);
    }

    public function autor()
    {
        $this->belongsTo(Autor::class);
    }

    public function korisnik()
    {
        $this->belongsTo(User::class);
    }
}
