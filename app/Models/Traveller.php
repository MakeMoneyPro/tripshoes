<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Traveller extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_traveller';
    protected $fillable = [
        'user_id', 'booking_id', 'lat', 'lng',
    ];

    /* Get all from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    /* Get all from Booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function bookings()
    {
        return $this->belongsTo('App\Models\Booking','booking_id');
    }
}
