<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model {
    protected $table = 'discipline';
    public $timestamps = false;
    protected $fillable = ['name'];

    // Связь многие ко многим с группами
    public function groups() {
        return $this->belongsToMany(Group::class, 'group_disciplines', 'discipline_id', 'group_of_students_id');
    }

    // Студенты, изучающие дисциплину (через группы)
    public function getStudentsAttribute() {
        $students = collect();
        foreach ($this->groups as $group) {
            $students = $students->merge($group->students);
        }
        return $students;
    }
}