<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Address extends Model implements Transformable
{
    use TransformableTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_address';
    protected $fillable = [
        'user_id', 'address', 'address_cont', 'city', 'state', 'post_code', 'country', 'country_code',
    ];
    /**
     * Get the user record associated with the user.
     */
    public function users()
    {
        return $this->hasOne('App\Model\User', 'user_id');
    }
    /**
     * Get the user record associated with the user.
     */
    public function creditcarts()
    {
    	return $this->hasMany('App\Model\CreditCart');
    }
}
