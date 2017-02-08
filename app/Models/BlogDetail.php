<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BlogDetail extends Model implements Transformable
{
    use TransformableTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_blog_detail';
    protected $fillable = [
        'tour_information_id', 'content',
    ];
    /**
     * Get the phone record associated with the user.
     */
    public function tours()
    {
        return $this->hasOne('App\Model\BlogDetail', 'tour_information_id');
    }
}
