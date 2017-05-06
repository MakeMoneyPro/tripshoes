<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\TicketRepositoryEloquent;
use App\Repositories\Eloquent\BlogDetailRepositoryEloquent;
use Exception;

class TourController extends Controller
{
    protected $tourinforepo;
    protected $imagerepo;
    protected $ticketrepo;
    protected $blogdetailrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param TourInformationRepositoryEloquent       $tourinfo      the tourinfo repository
     * @param ImageRepositoryEloquent       $image      the image repository
     * @param TicketRepositoryEloquent       $ticket      the ticket repository
     *
     * @return void
     */
    public function __construct(TourInformationRepositoryEloquent $tourinfo, ImageRepositoryEloquent $image, TicketRepositoryEloquent $ticket, BlogDetailRepositoryEloquent $blogdetail)
    {
        $this->tourinforepo = $tourinfo;
        $this->imagerepo = $image;
        $this->ticketrepo = $ticket;
        $this->blogdetailrepo =$blogdetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourinfos = $this->tourinforepo->with('images')->simplePaginate(6);
        foreach ($tourinfos as $key => $value) {
                $tourlist[]=$value;
                $image=$value['images']->first();
                $tourlist[$key]['image']=$image['url'];
            }
        return view('backend.blogs.index',compact('tourlist','tourinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
             $list = $this->tourinforepo->find($id);
            return view('backend.blogs.edit', compact('list'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin_manager_user.no_id'));
            return redirect()->route('admin.blogs.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        try {
            $count = $this->tourinforepo->find($id);
            if (!empty($count)) {
                $result = $this->tourinforepo->delete($id);
                if ($result) {
                    Session::flash(trans('lang_admin_manager_user.success_cf'), trans('lang_admin_manager_user.delete_success'));
                } else {
                    Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
                }
            } else {
                Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.delete_fail'));
            }
            return redirect() -> route('admin.tour.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.tour.index');
        }
    }
}
