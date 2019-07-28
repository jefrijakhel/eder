<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Submenu extends Eloquent {

    protected $table = "submenu"; // table name
    protected $fillable = ['nama_submenu'];
    public $timestamps = false;
}