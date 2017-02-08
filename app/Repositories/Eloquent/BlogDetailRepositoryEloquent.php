<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\BlogDetailRepository;
use App\Models\BlogDetail;
use App\Validators\BlogDetailValidator;

/**
 * Class BlogDetailRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class BlogDetailRepositoryEloquent extends BaseRepository implements BlogDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlogDetail::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
