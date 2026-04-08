<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'middle_name',
        'gender', 'birth_date', 'registration_address_id', 'group_of_students_id'
    ];
}
