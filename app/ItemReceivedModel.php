<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReceivedModel extends Model
{
    //
       //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_received';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
