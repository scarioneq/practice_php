<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model {
    protected $table = 'grades';
    public $timestamps = false;
    protected $fillable = ['student_id', 'discipline_id', 'grade'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id');
    }
}