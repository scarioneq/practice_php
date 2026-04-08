<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Auth\Auth;
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
        return new View('site.hello', ['message' => 'Главная страница']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            Auth::attempt($request->all());
            app()->route->redirect('/');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }
}
