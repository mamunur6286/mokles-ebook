<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SalonRegisterRequest;
use App\Models\Area;
use App\Models\District;
use App\Models\GeneralSetting;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Thana;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/settings",
     *     tags={"Settings"},
     *     summary="Get general settings",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/GeneralSetting")
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        try {
            $setting = GeneralSetting::query()->get();

            return response()->json([
                'success' => true,
                'message' => 'User and password not match.',
                'data' => $setting
            ], Response::HTTP_UNAUTHORIZED);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/settings/services",
     *     tags={"Settings"},
     *     summary="Get list of services",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/ServiceCollection")
     *     )
     * )
     */
    public function services(): JsonResponse
    {
        try {

            $services = Service::query()->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Services retrieved successfully.',
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

    /**
     * @OA\Get(
     *     path="/api/v1/settings/districts",
     *     tags={"Settings"},
     *     summary="Get list of districts",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/DistrictCollection")
     *     )
     * )
     */
    public function districts(): JsonResponse
    {
        try {

            $districts = District::query()->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Districts retrieved successfully.',
                'data' => $districts
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/settings/thanas",
     *     tags={"Settings"},
     *     summary="Get list of thanas",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/ThanaCollection")
     *     )
     * )
     */
    public function thanas(): JsonResponse
    {
        try {

            $thanas = Thana::query()->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Thanas retrieved successfully.',
                'data' => $thanas
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/settings/areas",
     *     tags={"Settings"},
     *     summary="Get list of areas",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/AreaCollection")
     *     )
     * )
     */
    public function areas(): JsonResponse
    {
        try {

            $areas = Area::query()->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Areas retrieved successfully.',
                'data' => $areas
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/v1/settings/areas",
     *     tags={"Settings"},
     *     summary="Get list of areas",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(ref="#/components/schemas/AreaCollection")
     *     )
     * )
     */
    public function slider(): JsonResponse
    {
        try {

            $sliders = Slider::query()->where('status', 1)->get();

            return response()->json([
                'success' => true,
                'message' => 'Slider retrieved successfully.',
                'data' => $sliders
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
