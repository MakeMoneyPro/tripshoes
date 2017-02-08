<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Review extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_review';
    protected $fillable = [
        'tour_information_id', 'user_id', 'content', 'rate',  
    ];
    /**
     * Get id from TourInformation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tourinformation()
    {
        return $this->belongsTo('App\Models\TourInformation','tour_information_id');
    }
    /**
     * Get id from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function userid()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
