<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Employee extends Eloquent {

    protected $table = "employee"; // table name
    protected $fillable = ['nama', 
                            'posisi'];
    public $timestamps = false;
}