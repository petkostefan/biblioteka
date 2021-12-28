<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\User;


class Book extends Model
{
    use HasFactory;


    public function izdavac()
    {
        $this->belongsTo(Publisher::class);
    }

    public function autor()
    {
        $this->belongsTo(Author::class);
    }

    public function korisnik()
    {
        $this->belongsTo(User::class);
    }
}
