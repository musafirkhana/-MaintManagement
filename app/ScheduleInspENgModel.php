<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleInspENgModel extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schedule_insp_engine';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
