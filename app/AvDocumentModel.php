<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvDocumentModel extends Model
{
    //
 
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ac_document';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
