<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Pengeluaran extends Eloquent {

    protected $table = "pengeluaran"; // table name
    protected $fillable = ['jenis_pengeluaran', 
                            'deskripsi', 
                            'fk_pengeluaran', 
                            'jumlah'];
    public $timestamps = false;
}