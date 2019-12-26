<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Now extends Model
{
    /**
     * Assign model to a table
     */
    protected $table = 'now';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'age'
        , 'sex'
        , 'location'
        , 'occupation'
        , 'listening_to'
        , 'watching'
        , 'playing'
        , 'reading'
        , 'excited_about'
        , 'working_on'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}
