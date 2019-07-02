<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Cart extends Eloquent {

    protected $table = "cart"; // table name
    protected $fillable = ['meja', 
                            'id_menu', 
                            'qty',
                            'notes'];
    public $timestamps = false;
}