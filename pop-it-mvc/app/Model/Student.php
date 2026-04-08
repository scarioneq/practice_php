<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    public $timestamps = false;
    protected $fillable = [
        'first_name', 'last_name', 'patronymic',
        'gender', 'date_of_birth', 'registration_address_id', 'group_of_students_id'
    ];

    // Связь с группой
    public function group() {
        return $this->belongsTo(Group::class, 'group_of_students_id');
    }

    // Связь с адресом
    public function address() {
        return $this->belongsTo(Address::class, 'registration_address_id');
    }

    // Дисциплины студента (через его группу)
    public function getDisciplinesAttribute() {
        if (!$this->group_of_students_id || !$this->group) {
            return collect();
        }
        return $this->group->disciplines;
    }
}
