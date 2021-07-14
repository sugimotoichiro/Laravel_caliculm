<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view("index")->with(["posts" => $post->getPaginateByLimit(5)]);
    }
    public function show(Post $post)
    {
        return view("show")->with(["post" => $post]);
    }
    public function create()
    {
        return view("create");
    }
    public function store(Request $request,Post $post)
    {
       $input = $request["post"];
       $post->fill($input)->save();//クライアント側からのデータを空のpost インスタンスに保存する。
       return redirect('/posts/' . $post->id);//URLの変更
    }
    
}