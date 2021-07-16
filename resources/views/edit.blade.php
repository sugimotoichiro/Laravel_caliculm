<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
       <h1>Blog Name</h1>
            <form action = "/posts/{{ $post->id }}" method="POST" >
                @csrf
                @method("PUT")
                <div class ="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" value="{{old($post->title)}}"/>
                    <p class="title_error" style="color:red">{{$errors->first("post.title")}}</p>
                </div>
                <div class ="body">
                    <h2>body</h2>
                    <textarea type="text" name="post[body]" >{{old($post->body) }}</textarea>
                    <p class="body_error" style="color:red">{{($errors->first("post.body"))}}</p>
                </div>
                <input type="submit" value="update">
            </form>
            <div class="back">
                  <a href= "/posts/{{ $post->id }}">back</a>
            </div>
    </body>
</html>
