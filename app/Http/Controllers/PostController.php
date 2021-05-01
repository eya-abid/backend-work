<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function createPost(Request $request) {
   $post = new Post();
   $post->body = $request['body'];
   $request->user()->posts()->save($post);
   return;
}
}