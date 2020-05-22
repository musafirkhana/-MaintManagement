<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddFlghrsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flg_hours';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
