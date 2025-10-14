<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientManagement\PatientRequest;
use App\Models\App;
use App\Models\Patient;
use App\Services\DropdownService;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DropDownApiController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function __invoke (Request $request, DropdownService $dropdown)
    {
        try {

            $dropdowns = [
                'authorList'       => $dropdown->authorList(),
                'categoryList'         => $dropdown->categoryList(),
                'seriesList'     => $dropdown->seriesList(),
                'bookList'     => $dropdown->bookList(),
            ];

           
            return response()->json([
                'success' => true,
                'message' => 'Dropdown get successfully.',
                'data' => $dropdowns
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
