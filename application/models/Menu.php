<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Menu extends Eloquent {

    protected $table = "menu"; // table name
    protected $fillable = ['sub_menu', 
                            'nama_menu', 
                            'deskripsi_menu',
                            'jenis_menu',
                            'vendor',
                            'harga_menu'];
    public $timestamps = false;
}