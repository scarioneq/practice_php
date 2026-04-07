<?php

namespace Controller;

use Model\Post;
use Src\Request;
use Src\View;

class Site
{
    public function index(Request $request): string
    {
        $id = $request->get('id');

        $posts = $id ? Post::where('id', $id)->get() : Post::all();

        return (new View())->render('site.post', ['posts' => $posts]);
    }


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}
