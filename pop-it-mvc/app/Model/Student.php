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
}
