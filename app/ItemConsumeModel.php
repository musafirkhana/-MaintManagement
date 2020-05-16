<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemConsumeModel extends Model
{
    //
       //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_consumption';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
