<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Bahanbaku extends Eloquent {

    protected $table = "bahan_baku"; // table name
    protected $fillable = ['nama_bahan_baku', 
                            'jumlah', 
                            'satuan'];
    public $timestamps = false;
}