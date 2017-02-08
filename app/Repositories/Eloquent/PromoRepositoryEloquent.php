<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\PromoRepository;
use App\Models\Promo;
use App\Validators\PromoValidator;

/**
 * Class PromoRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class PromoRepositoryEloquent extends BaseRepository implements PromoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Promo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
