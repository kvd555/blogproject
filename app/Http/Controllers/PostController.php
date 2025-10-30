<?php

namespace App\Http\Controllers;

use App\Enums\PostStatusEnum;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'sometimes|required|integer',
            'user_id' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'item_count' => 'sometimes|required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $query = Post::with('post_category')->where('status', PostStatusEnum::Published)->latest();

        if ($request->has('id')) {
            $query->where('id', $request->input('id'));

        } else {
            if ($request->has('user_id')) {
                $query->where('user_id', $request->input('user_id'));
            }
            if ($request->has('category_id')) {
                $query->where('post_category_id', $request->input('category_id'));
            }
        }
        if ($request->has('id')) {
            $posts = $query->latest()->get();
        } else {
            $perPage = $request->input('item_count', 15);

            $posts = $query->latest()->paginate($perPage);
        }

        if ($posts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Постов не найдено',
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Пост успешно обновлен.',
            'data' => $post->fresh() // Получаем обновленные данные поста
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
