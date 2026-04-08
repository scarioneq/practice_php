<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class Admin {
    public function addUser(Request $request): string
    {
        if ($request->method === 'POST') {
            if (User::create($request->all())) {

                return new View('site.adduser', ['message' => 'Сотрудник успешно добавлен в систему']);
            }
        }
        return new View('site.adduser');
    }

    public function allUsers(): string
    {
        $users = User::all();
        return new View('site.users', ['users' => $users]);
    }

    public function deleteUser(Request $request): void
    {
        $id = $request->get('id');
        $currentUser = Auth::user();

        if ($currentUser->id != $id) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }
        }

        app()->route->redirect('/users');
    }
}