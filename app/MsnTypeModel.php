<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsnTypeModel extends Model
{
 
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'msn_table';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
