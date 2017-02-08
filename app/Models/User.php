<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements Transformable,
                                    AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use TransformableTrait, Authenticatable, Authorizable, CanResetPassword;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_user';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modified_date';

    protected $fillable = [
        'username', 'email', 'q_user_id', 'age', 'country', 'workphone', 'mobile_phone', 'avatar', 'photo','lat', 'lng', 'first_name', 'last_name', 'is_available', 'is_deleted', 'modified_date', 'created_date', 'is_guide', 'about_guide', 'api_key', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_hash', 'password','remember_token',
    ];
    /* Get all from Booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    /* Get all from Invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
    /* Get all from Review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    /* Get all from Traveller.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function travellers()
    {
        return $this->hasMany('App\Models\Traveller');
    }
    /* Get all from TourUser.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tourusers()
    {
        return $this->hasMany('App\Models\TourUser');
    }
    /* Get all from CreditCard.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function creditcards()
    {
        return $this->hasMany('App\Models\CreditCard');
    }
    /* Get all from TourInformation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tourinformations()
    {
        return $this->hasMany('App\Models\TourInformation');
    }

    public function getAuthPassword () {

        return $this->password_hash;

    }
}
