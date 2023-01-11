<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index() {
        $perPage = $request->query('per_page');
        $paginateCategory = Category::paginate($perPage);
        $paginateCategory->appends(['per_page'=>$perPage]);
        return response()->json($paginateCategory);
    }

    public function store(Request $request) {
        $statusHttp = 500;
        try {
            if(!$request->user()->tokenCan('is-admin')) {
                $statusHttp = 403;
                throw new \Exception("You don't have permission to do that.");
            }
            $newCategory = $request->all();
            $storedCategory = Category::create($newCategory);
            return response()->json([
                'message' => 'Category added.',
                'Category' => $storedCategory
            ]);
        } catch (\Exception $error) {
            $message = [
                "Error:" => "Error while inserting new category.",
                "Exception:" => $error->getMessage()
            ];
            return response()->json($message, $statusHttp);
        }
    }

    public function show(Category $category) {
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, Category $category) {
        $statusHttp = 500;
        try {
            if(!$request->user()->tokenCan('is-admin')) {
                $statusHttp = 403;
                throw new \Exception("You don't have permission to do that.");
            }
            $data = $request->all();
            $category->update($data);
            return response()->json([
                'message' => 'Category updated.',
                'Category' => $category
            ]);
        } catch (\Exception $error) {
            $message = [
                "Error:" => "Error while updating",
                "Exception" => $error->getMessage()
            ];
            return response()->json($message, $statusHttp);
        }
    }

    public function destroy(Category $category) {
        try {
            if(!$category->delete()) {
                throw new Exception("Unknown error. Try again later.");
            }
            return response()->json([
                "message" => "Category deleted.",
                "category" => $category
            ]);
        } catch (\Exception $error) {
            $responseError = [
                "Error" => "Error while deleting.",
                "Exception" => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function series(Category $category) {
        return response()->json([
            ['category' => $category->load('series')]
        ]);
    }
}
