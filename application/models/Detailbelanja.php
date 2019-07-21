<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Detailbelanja extends Eloquent {

    protected $table = "detail_belanja"; // table name
    protected $fillable = ['id_belanja', 
                            'id_bahan_baku', 
                            'jumlah',
                            'harga_kisaran',
                            'harga_fix'];
    public $timestamps = false;
}