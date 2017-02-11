<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\TicketRepositoryEloquent;
use Exception;
class TripController extends Controller
{
    protected $tourinforepo;
    protected $imagerepo;
    protected $ticketrepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param TourInformationRepositoryEloquent       $tourinfo      the tourinfo repository
     * @param ImageRepositoryEloquent       $image      the image repository
     * @param TicketRepositoryEloquent       $ticket      the ticket repository
     *
     * @return void
     */
    public function __construct(TourInformationRepositoryEloquent $tourinfo, ImageRepositoryEloquent $image, TicketRepositoryEloquent $ticket)
    {
        $this->tourinforepo = $tourinfo;
        $this->imagerepo = $image;
        $this->ticketrepo = $ticket;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$tourinfos = $this->tourinforepo->with('images')->simplePaginate(4);
        foreach ($tourinfos as $key => $value) {
                $tourlist[]=$value;
                $image = $value['images']->first();
                $tourlist[$key]['image'] = $image['url'];
            }
    	return view('frontend.trips_no_login',compact('tourlist','tourinfos'));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tour = $this->tourinforepo->find($id);
            $images = $this->imagerepo->findByField('tour_information_id', $id)->take(4);
            $image = $this->imagerepo->findByField('tour_information_id', $id)->first('url');
            $ticket = $this->ticketrepo->all();
            $banner = false;
			$text_banner = "";
            return  view('frontend.bicycle_experience', compact('tour', 'ticket','images','image','banner','text_banner', 'id'));
        } catch (Exception $ex) {
            return redirect()->route('trip');
        }
    }

    public function tripwithlogin(){
        $tickets = $this->ticketrepo->all();
        $banner = '';
        $text_banner = '';
        return view('frontend.trips_with_login', compact('banner', 'text_banner', 'tickets'));
    }

}
