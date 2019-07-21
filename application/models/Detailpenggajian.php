<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Detailpenggajian extends Eloquent {

    protected $table = "detail_penggajian"; // table name
    protected $fillable = ['id_employee', 
                            'punishment', 
                            'detail_punishment',
                            'total_gaji'];
    public $timestamps = false;
}