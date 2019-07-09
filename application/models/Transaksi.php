<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Transaksi extends Eloquent {

    protected $table = "transaksi"; // table name
    protected $fillable = ['meja', 
                            'id_menu', 
                            'transaksi_fk',
                            'qty',
                            'notes',
                            'status',
                            'nama_customer',
                            'email',
                            'no_hp'];
    public $timestamps = false;
}