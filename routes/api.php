<?php

use App\Models\Lesson;
use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello, this is a sample GET route haha!',
    ]);
});

Route::get('/categories', function () {
    $categories = Category::orderBy('sort_order', 'asc')->get(['id', 'name', 'sort_order']);

    return response()->json($categories);
});

Route::get('/lessons/{category_id}', function ($category_id) {
    $lessons = Lesson::where('category_id', $category_id)->get(['id', 'name', 'sort_order', 'category_id']);

    return response()->json($lessons);
});

Route::get('/exercises/{lesson_id}', function ($lesson_id) {
    $all = Exercise::where('lesson_id', $lesson_id)->get(['id', 'content', 'parent_id']);

    // Helper to build tree
    function buildTree($items, $parentId = null)
    {
        $tree = [];

        foreach ($items as $item) {
            if ($item->parent_id === $parentId) {
                $children = buildTree($items, $item->id);
                $node = [
                    'id' => $item->id,
                    'content' => $item->content,
                    'parent_id' => $item->parent_id,
                ];
                if (!empty($children)) {
                    $node['children'] = $children;
                }
                $tree[] = $node;
            }
        }

        return $tree;
    }

    $tree = buildTree($all);

    return response()->json($tree);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
