<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $table = "users"; // table name
    protected $fillable = ['username', 
                            'password', 
                            'privillege'];
    public $timestamps = false;
}