<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Posisi extends Eloquent {

    protected $table = "posisi"; // table name
    protected $fillable = ['nama_posisi', 
                            'gaji'];
    public $timestamps = false;
}