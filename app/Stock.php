<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stocks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['stock', 'buyprice', 'todaysprice', 'currentprice', 'email', 'maxgain'];

    public function setBuypriceAttribute($value)
    {
        if($value=='')
            $this->attributes['buyprice'] = null;
        else
            $this->attributes['buyprice'] = preg_replace('/[^0-9.]/', '', $value);
    }

    public function setTodayspriceAttribute($value)
    {
        if($value=='')
            $this->attributes['todaysprice'] = null;
        else
            $this->attributes['todaysprice'] = preg_replace('/[^0-9.]/', '', $value);
    }

    public function setCurrentpriceAttribute($value)
    {
        if($value=='')
            $this->attributes['currentprice'] = null;
        else
            $this->attributes['currentprice'] = preg_replace('/[^0-9.]/', '', $value);
    }

    
}
