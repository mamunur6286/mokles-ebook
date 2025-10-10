<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            $name = $request->get('name');

            $models = Lesson::query()
                ->when($name, function (Builder $query) use ($name) {
                    return $query->where('name', 'LIKE', '%'.$name.'%');
                })
                ->latest()
                ->paginate(config('app.per_page'));


            return response()->json([
                'success' => true,
                'message' => 'Data get successfully.',
                'data' => $models
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => app()->isProduction() ? 'Internal Server Error' : $e->getMessage(),
                'data' => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function store(LessonRequest $request)
    {
        try {

            Lesson::create($request->fields());

            return response()->json([
                'success' => true,
                'message' => 'Data store successfully.',
                'data' => []
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
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Lesson $series)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Data get successfully.',
                'data' => $series
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
     * Summary of update
     * @param mixed $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Lesson $series, LessonRequest $request)
    {
         try {

            $series->update($request->fields());


            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully.',
                'data' => []
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
     * Summary of changeStatus
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Lesson $series, Request $request)
    {
        try {

            $series->status = $request->get('status');
            $series->save();

            return response()->json([
                'success' => true,
                'message' => 'Data status change successfully.',
                'data' => []
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
