<?php

use Illuminate\Database\Eloquent\SoftDeletes;
//el profe comento esta linea

class Alumno extends \Illuminate\Database\Eloquent\Model 
{
    //el profe comento esta linea
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
   // protected $table = 'my_flights';

   /**
     * The primary key associated with the table.
     *
     * @var string
     */
    //protected $primaryKey = 'flight_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';
}