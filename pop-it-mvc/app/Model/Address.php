<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    protected $table = 'registration_address';
    public $timestamps = false;
    protected $fillable = ['index', 'region', 'city', 'flat', 'street'];
}