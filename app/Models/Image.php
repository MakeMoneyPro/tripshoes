<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_image';
    protected $fillable = [
        'tour_information_id', 'url', 
    ];
    /* Get id from TourInformation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function bookings()
    {
        return $this->belongsTo('App\Models\TourInformation');
    }
}
