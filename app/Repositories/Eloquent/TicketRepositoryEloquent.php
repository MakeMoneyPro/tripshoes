<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TicketRepository;
use App\Models\Ticket;
use App\Validators\TicketValidator;

/**
 * Class TicketRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TicketRepositoryEloquent extends BaseRepository implements TicketRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticket::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
