<?php

namespace Controller;

use Model\Address;
use Model\Discipline;
use Model\Group;
use Model\Student;
use Src\Request;
use Model\Post;
use Model\User;
use Src\Auth\Auth;
use Src\View;

class EmployeeDean {
    public function addStudent(Request $request): string
    {
        if ($request->method === 'POST') {
            // 1. Создаем адрес
            $address = Address::create([
                'index' => $request->get('index'),
                'region' => $request->get('region'),
                'city' => $request->get('city'),
                'street' => $request->get('street'),
                'flat' => $request->get('flat'),
            ]);

            // 2. Создаем студента с ID этого адреса
            $studentData = $request->all();
            $studentData['registration_address_id'] = $address->id;

            if (Student::create($studentData)) {
                app()->route->redirect('/hello');
            }
        }

        return new View('site.dean.add_student', ['groups' => Group::all()]);
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

    public function connectGroupAndDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $groupId = $request->get('group_of_students_id');
            $disciplineId = $request->get('discipline_id');

            $group = Group::find($groupId);
            // Добавляем связь в таблицу group_disciplines
            $group->disciplines()->attach($disciplineId);

            app()->route->redirect('/');
        }

        return new View('site.dean.connect', [
            'groups' => Group::all(),
            'disciplines' => Discipline::all()
        ]);
    }
}