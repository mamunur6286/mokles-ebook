<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SalonRegisterRequest;
use App\Http\Requests\SalonRequest;
use App\Http\Requests\SalonSeatRequest;
use App\Http\Requests\ServiceRequestRequest;
use App\Models\Salon;
use App\Models\SalonSeat;
use App\Models\ServiceRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalonApiController extends Controller
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
            $salons = Salon::query()->with('user', 'area', 'thana', 'district')
                ->when($request->input('search'), function ($query, $search) {
                    return $query->where(fn($query) 
                            => $query->where('name', 'like', "%{$search}%")
                            ->orWhere('address', 'like', "%{$search}%"));
                })
                ->when($request->input('district_id'), function ($query, $district_id) {
                    return $query->where('district_id', $district_id);
                })
                ->when($request->input('thana_id'), function ($query, $thana_id) {
                    return $query->where('thana_id', $thana_id);
                })
                ->when($request->input('area_id'), function ($query, $area_id) {
                    return $query->where('area_id', $area_id);
                })
                
                ->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'User and password not match.',
                'data' => $salons
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function show(Salon $salon): JsonResponse
    {
        $salon = $salon->load('user', 'area', 'thana', 'district');
        try {
            return response()->json([
                'success' => true,
                'message' => 'User and password not match.',
                'data' => $salon
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getSeat(Salon $salon): JsonResponse
    {
        try {

            $seats = $salon->seats;

            return response()->json([
                'success' => true,
                'message' => 'User and password not match.',
                'data' => $seats
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function storeSeat(SalonSeatRequest $request): JsonResponse
    {
        try {

            $salon = SalonSeat::query()->create($request->fields());

            return response()->json([
                'success' => true,
                'message' => 'Seat created successfully.',
                'data' => $salon
            ], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function updateSeat(SalonSeat $salonSeat, SalonSeatRequest $request): JsonResponse
    {
        try {

            $salonData = $salonSeat->update($request->fields());

            return response()->json([
                'success' => true,
                'message' => 'Salon seat updated successfully.',
                'data' => $salonSeat

            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function bookSeat(ServiceRequestRequest $request): JsonResponse
    {
        try {

            $salon = SalonSeat::query()->create($request->fields());

            return response()->json([
                'success' => true,
                'message' => 'Seat created successfully.',
                'data' => $salon
            ], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function update(Salon $salon, SalonRequest $request): JsonResponse
    {
        try {

            $user = $salon->user;
            $user->update([
                'name' => $request->input('owner_name'),
                'mobile_no' => $request->input('mobile_no'),
                'address' => $request->input('address'),
            ]);
            $input = $request->fields();
            $input['user_id'] = $user->id;
            $salon->update($input);

            return response()->json([
                'success' => true,
                'message' => 'Salon updated successfully.',
                'data' => $salon
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function services(Salon $salon): JsonResponse
    {
        try {

            $services = ServiceRequest::query()->where('salon_id', $salon->id)->get();

            return response()->json([
                'success' => true,
                'message' => 'Salon updated successfully.',
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
}
