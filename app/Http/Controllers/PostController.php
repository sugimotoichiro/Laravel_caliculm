<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

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
    public function store(Post $post, PostRequest $request)
    {
        $input = $request["post"];
        $post->fill($input)->save();//クライアント側からのデータを空のpost インスタンスに保存する。
        return redirect('/posts/' . $post->id);//URLの変更
    }
    public function edit(Post $post)
    {
        return view("edit")->with([ "post"=> $post] );
    }
    public function update(Post $post, PostRequest $request)
    {
        $input = $request["post"];
        $post->fill($input)->save();
        return redirect("/posts/". $post->id);
    }
}