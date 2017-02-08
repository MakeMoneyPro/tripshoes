<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\BookingRepository;
use App\Models\Booking;
use App\Validators\BookingValidator;

/**
 * Class BookingRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class BookingRepositoryEloquent extends BaseRepository implements BookingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booking::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
