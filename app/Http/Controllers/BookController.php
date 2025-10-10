<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index(Request $request)
    {
        try {
            $books = Book::where('status', ACTIVE)->get();

            return view('books');

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    
    public function show(Request $request)
    {
        try {

            $book = Book::query()->find($request->id);

            return view('book_details', ['book' => $book]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function lesson(Request $request)
    {
        try {
            $book = Book::query()->with('lessons')->find($request->id);

            return view('book_reader', ['book' => $book]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }

}
