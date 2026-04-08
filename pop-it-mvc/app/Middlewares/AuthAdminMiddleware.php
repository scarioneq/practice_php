<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class AuthAdminMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::user()->is_admin==0) {
            echo (new View())->render('site.forbidden');
            die();
        }
    }
}