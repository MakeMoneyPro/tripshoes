<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TourInformation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_tour_information';
    protected $fillable = [
        'guide_id', 'place_id', 'price', 'time', 'time_period', 'transport', 'name', 'about', 'highlights', 'about_tour', 'reviews', 'about_guide', 'is_available', 'lat', 'lng', 'address'
    ];
    public $timestamps = false;

    /**
     * Get id from Place.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function places()
    {
        return $this->belongsTo('App\Models\Place','place_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function userid()
    {
        return $this->belongsTo('App\Models\User','guide_id');
    }
    /**
     * Get all from review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    /**
     * Get all from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    /* Get all from Image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image','tour_information_id','id');
    }
}
