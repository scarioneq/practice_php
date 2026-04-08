<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'patronymic',
        'gender', 'date_of_birth', 'registration_address_id', 'group_of_students_id'
    ];
}
