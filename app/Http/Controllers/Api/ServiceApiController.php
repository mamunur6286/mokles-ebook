<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalonRequest;
use App\Http\Requests\ServiceRequestRequest;
use App\Models\Salon;
use App\Models\SalonSeat;
use App\Models\ServiceRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/salons",
     *     tags={"Salons"},
     *     summary="Get list of salons",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/SalonCollection")
     *     )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $services = ServiceRequest::query()->with('salon', 'service', 'user')
                ->when($request->input('search'), function ($query, $search) {
                    return $query->where(fn($query) 
                            => $query->where('name', 'like', "%{$search}%")
                            ->orWhere('address', 'like', "%{$search}%"));
                })
                ->where('user_id', auth()->user()->id)
                ->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Service retrieved successfully.',
                'data' => $services
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(ServiceRequestRequest $request): JsonResponse
    {
        try {

            $serviceRequest = ServiceRequest::query()->create($request->fields());

            return response()->json([
                'success' => true,
                'message' => 'Seat request created successfully.',
                'data' => $serviceRequest
            ], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
   
}
