<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TravellerRepository;
use App\Models\Traveller;
use App\Validators\TravellerValidator;

/**
 * Class TravellerRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TravellerRepositoryEloquent extends BaseRepository implements TravellerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Traveller::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
