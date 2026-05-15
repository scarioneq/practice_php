<?php

namespace Controller;

use Model\Address;
use Model\Discipline;
use Model\Grade;
use Model\Group;
use Model\Student;
use Src\Request;
use Src\View;

class EmployeeDean {
    public function allStudents(): string
    {
        $students = Student::with(['group', 'address'])->get();
        return new View('site.dean.students', ['students' => $students]);
    }

    public function studentDisciplines(Request $request): string
    {
        $student = Student::with(['group'])->find($request->get('id'));
        return new View('site.dean.student_disciplines', ['student' => $student]);
    }

    public function studentGrades(Request $request): string
    {
        $student = Student::with(['group', 'grades.discipline'])->find($request->get('id'));
        return new View('site.dean.student_grades', ['student' => $student]);
    }

    public function addGrade(Request $request): string
    {
        if ($request->method === 'POST') {
            Grade::create([
                'student_id' => $request->get('student_id'),
                'discipline_id' => $request->get('discipline_id'),
                'grade' => $request->get('grade'),
            ]);
            app()->route->redirect('/student-grades?id=' . $request->get('student_id'));
        }

        $student = Student::with('disciplines')->find($request->get('student_id'));
        return new View('site.dean.add_grade', [
            'student' => $student,
            'disciplines' => $student->disciplines,
        ]);
    }

    public function editGrade(Request $request): string
    {
        $grade = Grade::with('student', 'discipline')->find($request->get('id'));

        if ($request->method === 'POST') {
            $grade->update([
                'grade' => $request->get('grade'),
            ]);
            app()->route->redirect('/student-grades?id=' . $grade->student_id);
        }

        $student = Student::with('disciplines')->find($grade->student_id);
        return new View('site.dean.edit_grade', [
            'grade' => $grade,
            'disciplines' => $student->disciplines,
        ]);
    }

    public function deleteGrade(Request $request): void
    {
        $grade = Grade::find($request->get('id'));
        $studentId = $grade ? $grade->student_id : null;

        if ($grade) {
            $grade->delete();
        }

        if ($studentId) {
            app()->route->redirect('/student-grades?id=' . $studentId);
        } else {
            app()->route->redirect('/students');
        }
    }

    public function addStudent(Request $request): string
    {
        if ($request->method === 'POST') {
            $address = Address::create([
                'index' => $request->get('index'),
                'region' => $request->get('region'),
                'city' => $request->get('city'),
                'street' => $request->get('street'),
                'flat' => $request->get('flat'),
            ]);

            $studentData = $request->all();
            $studentData['registration_address_id'] = $address->id;

            if (Student::create($studentData)) {
                app()->route->redirect('/students');
            }
        }

        return new View('site.dean.add_student', ['groups' => Group::all()]);
    }

    public function editStudent(Request $request): string
    {
        $student = Student::with('address')->find($request->get('id'));

        if ($request->method === 'POST') {
            $address = $student->address;
            if ($address) {
                $address->update([
                    'index' => $request->get('index'),
                    'region' => $request->get('region'),
                    'city' => $request->get('city'),
                    'street' => $request->get('street'),
                    'flat' => $request->get('flat'),
                ]);
            }

            $student->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'patronymic' => $request->get('patronymic'),
                'gender' => $request->get('gender'),
                'date_of_birth' => $request->get('date_of_birth'),
                'group_of_students_id' => $request->get('group_of_students_id'),
            ]);

            app()->route->redirect('/students');
        }

        return new View('site.dean.edit_student', [
            'student' => $student,
            'groups' => Group::all()
        ]);
    }

    public function deleteStudent(Request $request): void
    {
        $student = Student::find($request->get('id'));

        if ($student && $student->registration_address_id) {
            Address::destroy($student->registration_address_id);
        }

        if ($student) {
            $student->delete();
        }

        app()->route->redirect('/students');
    }

    public function allGroups(): string
    {
        $groups = Group::with('students')->get();
        return new View('site.dean.groups', ['groups' => $groups]);
    }

    public function groupDetail(Request $request): string
    {
        $group = Group::with('students', 'disciplines')->find($request->get('id'));
        return new View('site.dean.group_detail', ['group' => $group]);
    }

    public function addGroup(Request $request): string
    {
        if ($request->method === 'POST') {
            Group::create(['name' => $request->get('name')]);
            app()->route->redirect('/groups');
        }

        return new View('site.dean.add_group');
    }

    public function editGroup(Request $request): string
    {
        $group = Group::find($request->get('id'));

        if ($request->method === 'POST') {
            $group->update(['name' => $request->get('name')]);
            app()->route->redirect('/groups');
        }

        return new View('site.dean.edit_group', ['group' => $group]);
    }

    public function deleteGroup(Request $request): void
    {
        $group = Group::find($request->get('id'));
        if ($group) {
            $group->delete();
        }
        app()->route->redirect('/groups');
    }

    public function allDisciplines(): string
    {
        $disciplines = Discipline::all();
        return new View('site.dean.disciplines', ['disciplines' => $disciplines]);
    }

    public function disciplineDetail(Request $request): string
    {
        $discipline = Discipline::find($request->get('id'));
        $discipline->load('groups');
        return new View('site.dean.discipline_detail', ['discipline' => $discipline]);
    }

    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            Discipline::create(['name' => $request->get('name')]);
            app()->route->redirect('/disciplines');
        }

        return new View('site.dean.add_discipline');
    }

    public function editDiscipline(Request $request): string
    {
        $discipline = Discipline::find($request->get('id'));

        if ($request->method === 'POST') {
            $discipline->update(['name' => $request->get('name')]);
            app()->route->redirect('/disciplines');
        }

        return new View('site.dean.edit_discipline', ['discipline' => $discipline]);
    }

    public function deleteDiscipline(Request $request): void
    {
        $discipline = Discipline::find($request->get('id'));
        if ($discipline) {
            $discipline->delete();
        }
        app()->route->redirect('/disciplines');
    }

    public function connectGroupAndDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $groupId = $request->get('group_of_students_id');
            $disciplineId = $request->get('discipline_id');

            $group = Group::find($groupId);
            $group->disciplines()->attach($disciplineId);

            app()->route->redirect('/');
        }

        return new View('site.dean.connect', [
            'groups' => Group::all(),
            'disciplines' => Discipline::all()
        ]);
    }

    public function gradesByGroups(): string
    {
        $groups = Group::with('students.grades.discipline')->get();
        return new View('site.dean.grades_by_groups', ['groups' => $groups]);
    }

    public function gradesByDisciplines(): string
    {
        $disciplines = Discipline::with('grades.student')->get();
        return new View('site.dean.grades_by_disciplines', ['disciplines' => $disciplines]);
    }
}