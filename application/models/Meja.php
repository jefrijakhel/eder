<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Meja extends Eloquent {

    protected $table = "meja"; // table name
    protected $fillable = ['username', 
                            'password', 
                            'no_meja',
                            'status',
                            'nama_customer',
                            'email',
                            'no_hp'];
    public $timestamps = false;
}