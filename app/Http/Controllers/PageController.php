<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Series;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function about(Request $request)
    {
        try {

            return view('about');

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function contact(Request $request)
    {
        try {

            return view('contact');

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function privacyPolicy(Request $request)
    {
        try {

            return view('privacy_policy');

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function termsCondition(Request $request)
    {
        try {

            return view('terms_conditions');

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function authors(Request $request)
    {
        try {
            $authors = Author::query()->withCount('books')->get();
            return view('authors', compact('authors'));

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function categories(Request $request)
    {
        try {
            $categories = Category::query()->withCount('books')->get();
            return view('categories', compact('categories'));

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
    public function series(Request $request)
    {
        try {
            $series = Series::query()->withCount('books')->get();
            return view('series', compact('series'));

        } catch (Exception $e) {
            return redirect()->back()->with('error', app()->isProduction() ? 'Internal Server Error' : $e->getMessage());
        }
    }
}
