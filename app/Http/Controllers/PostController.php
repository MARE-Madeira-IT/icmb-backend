<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::orderBy('created_at','DESC')->paginate(15));
    }

    public function store(PostRequest $request)
    {
        $validator = $request->validated();

        if (array_key_exists("image", $validator)) {
            $validator["image_url"] = Storage::putFile("posts", $validator["image"]);
        }

        $new = Post::create(
            [
                "user_id" => $validator["user_id"],
                "message" => $validator["message"] ?? null,
                "image_url" => $validator["image_url"] ?? null,
            ]
        );

        return new PostResource($new);
    }
}
