<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Author extends Model
{
    use HasFactory;

    public function knjige()
    {
        $this->hasMany(Book::class);
    }
}
