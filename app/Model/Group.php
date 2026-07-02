<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {
    protected $table = 'group_of_students';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function disciplines() {
        return $this->belongsToMany(Discipline::class, 'group_disciplines', 'group_of_students_id', 'discipline_id');
    }

    public function students() {
        return $this->hasMany(Student::class, 'group_of_students_id');
    }

    public function grades()
    {
        return $this->hasManyThrough(Grade::class, Student::class, 'group_of_students_id', 'student_id');
    }
}