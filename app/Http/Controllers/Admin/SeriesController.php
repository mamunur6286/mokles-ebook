<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Models\Series;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeriesController extends Controller
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
            $category = $request->get('category_id');
            $author = $request->get('author_id');

            $models = Series::query()->with(['author', 'category'])
                ->when($category, function (Builder $query) use ($category) {
                    return $query->where('category_id', $category);
                })
                ->when($author, function (Builder $query) use ($author) {
                    return $query->where('author_id', $author);
                })
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

    
    public function store(SeriesRequest $request)
    {
        try {

            $input = $request->fields();
            $input['banner_image'] = fileUpload('banner_image');
            Series::create($input);


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
    public function edit(Series $series)
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
    public function update(Series $series, SeriesRequest $request)
    {
         try {

            $input = $request->fields();
            $input['banner_image'] = fileUpload('banner_image') ?: $series->banner_image;
            $series->update($input);

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
    public function changeStatus(Series $series, Request $request)
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
