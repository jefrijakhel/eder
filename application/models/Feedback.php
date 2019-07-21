<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Feedback extends Eloquent {

    protected $table = "feedback"; // table name
    protected $fillable = ['pertanyaan', 
                            'id_pertanyaan',
                            'nilai'];
    public $timestamps = false;
}