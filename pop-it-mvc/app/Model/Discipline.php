<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model {
    protected $table = 'discipline';
    public $timestamps = false;
    protected $fillable = ['name'];
}