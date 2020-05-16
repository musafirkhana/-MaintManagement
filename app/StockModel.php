<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockModel extends Model
{
    //
       //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_list';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
