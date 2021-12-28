<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class UserBooksController extends Controller
{
    public function userBooks($user_id)
    {
        $books = Book::get()->where('user_id', $user_id);
        if (is_null($books))
            return response()->json('Data not found', 404);
        return response()->json($books);
    }

    public function availableBooks()
    {
        $books = Book::get()->where('user_id', null);
        if (is_null($books))
            return response()->json('Data not found', 404);
        return response()->json($books);
    }

    public function rentBook(Request $request)
    {
        $book = Book::get()->where('id', $request->book_id);
        $book = $book->first();
        if ($book->user_id == null){
            Book::where('id',$request->book_id)->update(['user_id' => Auth::user()->id]);
            return response()->json('Uspesno ste iznajmili knjigu', 200);
        }
        return response()->json('Knjiga je zauzeta', 400);
    }

    public function returnBook(Request $request)
    {
        $book = Book::get()->where('id', $request->book_id);
        $book = $book->first();
        if ($book->user_id = Auth::user()->id){
            Book::where('id',$request->book_id)->update(['user_id' => null]);
            return response()->json('Uspesno ste vratili knjigu u biblioteku', 200);
        }
        return response()->json('Knjiga ne pripada trenutnom korisniku', 200);
    }
}
