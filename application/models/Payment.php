<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Payment extends Eloquent {

    protected $table = "payment"; // table name
    protected $fillable = ['id_transaksi', 
                            'total', 
                            'meja',
                            'metode',
                            'nama'];
    public $timestamps = false;
}