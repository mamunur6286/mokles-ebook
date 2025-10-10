<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
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

            $models = Category::query()
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

    
    public function store(CategoryRequest $request)
    {
        try {

            Category::create($request->fields());

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
    public function edit(Category $category)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Data get successfully.',
                'data' => $category
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
    public function update(Category $category, CategoryRequest $request)
    {
         try {

            $category->update($request->fields());


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
    public function changeStatus(Category $category, Request $request)
    {
        try {

            $category->status = $request->get('status');
            $category->save();

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
