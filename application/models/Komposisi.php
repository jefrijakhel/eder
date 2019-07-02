<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Komposisi extends Eloquent {

    protected $table = "komposisi"; // table name
    protected $fillable = ['id_bahan_baku', 
                            'id_menu', 
                            'jumlah_bahan_baku'];
    public $timestamps = false;
}