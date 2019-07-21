<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Belanja extends Eloquent {

    protected $table = "belanja"; // table name
    protected $fillable = ['permintaan_biaya', 
                            'biaya_fix',
                            'status',
                            'deskripsi'];
    public $timestamps = false;
}