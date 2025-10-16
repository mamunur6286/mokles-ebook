<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Series;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index(Request $request)
    {
            $category = $request->category ?? null;
            $author = $request->author ?? null;
            $series = $request->series ?? null;
            $search = $request->search ?? null;

            $authors = Author::query()->withCount('books')->where('status', ACTIVE)->get();
            $categories = Category::query()->withCount('books')->where('status', ACTIVE)->get();
            $seriesList = Series::query()->withCount('books')->where('status', ACTIVE)->get();

            $books = Book::query()->with('category', 'author', 'series')
                ->when($search, function ($query) use ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'LIKE', '%'.$search.'%')
                        ->orWhereHas('category', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%'.$search.'%');
                        })
                        ->orWhereHas('author', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%'.$search.'%');
                        })
                        ->orWhereHas('series', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%'.$search.'%');
                        });
                    });
                })
                ->when($category, function ($query, $category) {
                    return $query->whereHas('category', function ($q) use ($category) {
                        $q->where('slug', $category);
                    });
                })
                ->when($author, function ($query, $author) {
                    return $query->whereHas('author', function ($q) use ($author) {
                        $q->where('slug', $author);
                    });
                })
                ->when($series, function ($query, $series) {
                    return $query->whereHas('series', function ($q) use ($series) {
                        $q->where('slug', $series);
                    });
                })
                ->where('status', ACTIVE)
                ->when(request('sort'), function ($query) {
                    $query->when(request('sort') == 'a_z', function ($q) {
                        $q->orderBy('name', 'ASC');
                    })
                    ->when(request('sort') == 'z_a', function ($q) {
                        $q->orderBy('name', 'DESC');
                    })
                    ->when(request('sort') == 'oldfirst', function ($q) {
                        $q->oldest();
                    })
                    ->when(request('sort') == 'newfirst', function ($q) {
                        $q->latest();
                    });
                })
                ->paginate(24);
            return view('books', ['books' => $books, 'authors' => $authors, 'categories' => $categories, 'series' => $seriesList]);
    }
    
    public function show(Request $request, $slug)
    {
        try {

            $book = Book::query()->with('author', 'category', 'series', 'lessons')->where('slug', $slug)->first();
            if (!$book) {
                return redirect()->back()->with('error', 'Book not found');
            }

            return view('book_details', ['book' => $book]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function lesson(Request $request, $bookSlug)
    {
        $slug = $request->query('lesson', null);
        try {
            $book = Book::query()->with('lessons')
            ->where('slug', $bookSlug)->first();


            $lessons = $book->lessons->map(function ($lesson) {
                return [
                    'title' => $lesson->name,
                    'slug' => $lesson->slug,
                    'content' => $lesson->description,
                ];
            })->toArray();

            if (!$book) {
                return redirect()->back()->with('error', 'Book not found');
            }

            return view('book_reader', ['book' => $book, 'lessons' => $lessons, 'slug' => $slug]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }

}
