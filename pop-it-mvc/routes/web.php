<?php

use Src\Auth\Auth;
use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'index'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add(['GET', 'POST'], '/adduser', [Controller\Admin::class, 'addUser'])->middleware('authAdmin');
Route::add(['GET', 'POST'], '/delete-user', [Controller\Admin::class, 'deleteUser'])->middleware('authAdmin');
Route::add('GET', '/users', [Controller\Admin::class, 'allUsers'])->middleware('authAdmin');

Route::add(['GET', 'POST'], '/add-student', [Controller\EmployeeDean::class, 'addStudent'])->middleware('auth');
Route::add('GET', '/students', [Controller\EmployeeDean::class, 'allStudents'])->middleware('auth');
Route::add('GET', '/student-disciplines', [Controller\EmployeeDean::class, 'studentDisciplines'])->middleware('auth');
Route::add(['GET', 'POST'], '/edit-student', [Controller\EmployeeDean::class, 'editStudent'])->middleware('auth');
Route::add('GET', '/delete-student', [Controller\EmployeeDean::class, 'deleteStudent'])->middleware('auth');

Route::add('GET', '/groups', [Controller\EmployeeDean::class, 'allGroups'])->middleware('auth');
Route::add('GET', '/group-detail', [Controller\EmployeeDean::class, 'groupDetail'])->middleware('auth');
Route::add(['GET', 'POST'], '/add-group', [Controller\EmployeeDean::class, 'addGroup'])->middleware('auth');
Route::add(['GET', 'POST'], '/edit-group', [Controller\EmployeeDean::class, 'editGroup'])->middleware('auth');
Route::add('GET', '/delete-group', [Controller\EmployeeDean::class, 'deleteGroup'])->middleware('auth');

Route::add('GET', '/disciplines', [Controller\EmployeeDean::class, 'allDisciplines'])->middleware('auth');
Route::add('GET', '/discipline-detail', [Controller\EmployeeDean::class, 'disciplineDetail'])->middleware('auth');
Route::add(['GET', 'POST'], '/add-discipline', [Controller\EmployeeDean::class, 'addDiscipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/edit-discipline', [Controller\EmployeeDean::class, 'editDiscipline'])->middleware('auth');
Route::add('GET', '/delete-discipline', [Controller\EmployeeDean::class, 'deleteDiscipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/connect-group-discipline', [Controller\EmployeeDean::class, 'connectGroupAndDiscipline'])->middleware('auth');



