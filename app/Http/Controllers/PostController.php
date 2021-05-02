<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
public function createPost(Request $request) {
   $post = new Post();
   $post->body = $request['body'];
   $post->image_url = $request['image'];
   $user = auth()->user();
   $request->user()->posts()->save($post);

      return response()->json($post);

  }

   
}
   