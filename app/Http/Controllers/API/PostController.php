<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;


class PostController extends Controller
{
    /**
     * create new post
     */
    public function create(StoreRequest $request)
    {
        Post::updateOrCreate([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post added successfully',
        ]);
    }
}
