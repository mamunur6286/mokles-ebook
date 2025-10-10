<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {

            $data =[
                'total_users' => User::query()->where('role_id', 2)->count(),
            ];

            return view('home', ['data' => $data]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
