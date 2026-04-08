<?php

namespace Controller;

use Src\Request;
use Model\Post;
use Model\User;
use Src\Auth\Auth;
use Src\View;

class EmployeeDean {
    public function addStudent(Request $request): void
    {
        echo "шаблон добавления студент";
    }

    public function deleteStudent(Request $request): void
    {
        echo "шаблон удаления студента";
    }

    public function addGroup(Request $request): void
    {
        echo "шаблон добавления группы";
    }

    public function deleteGroup(Request $request): void
    {
        echo "шаблон удаления группы";
    }

    public function addDiscipline(Request $request): void
    {
        echo "шаблон добавления дисциплины";
    }
    public function deleteDiscipline(Request $request): void
    {
        echo "шаблон удаления дисциплины";
    }

    public function connectGroupAndDiscipline(Request $request): void
    {
        echo "шаблон связывания группы и дисциплины";
    }
}