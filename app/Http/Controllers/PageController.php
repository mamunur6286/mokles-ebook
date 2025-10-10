<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
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

}
