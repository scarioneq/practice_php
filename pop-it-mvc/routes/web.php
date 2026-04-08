<?php

use Src\Auth\Auth;
use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add(['GET', 'POST'], '/adduser', [Controller\Admin::class, 'addUser'])->middleware('authAdmin');
Route::add(['GET', 'POST'], '/deleteuser', [Controller\Admin::class, 'deleteUser'])->middleware('authAdmin');
Route::add('GET', '/users', [Controller\Admin::class, 'allUsers'])->middleware('authAdmin');

Route::add(['GET', 'POST'], '/addstudent', [Controller\EmployeeDean::class, 'addStudent'])->middleware('auth');
Route::add('GET', '/deleteStudent', [Controller\EmployeeDean::class, 'deleteStudent'])->middleware('auth');

Route::add(['GET', 'POST'], '/addgroup', [Controller\EmployeeDean::class, 'addGroup'])->middleware('auth');
Route::add(['GET', 'POST'], '/deletegroup', [Controller\EmployeeDean::class, 'deleteGroup'])->middleware('auth');

Route::add(['GET', 'POST'], '/adddiscipline', [Controller\EmployeeDean::class, 'addDiscipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/deleteDiscipline', [Controller\EmployeeDean::class, 'deleteDiscipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/connectGroupAndDiscipline', [Controller\EmployeeDean::class, 'connectGroupAndDiscipline'])->middleware('auth');



