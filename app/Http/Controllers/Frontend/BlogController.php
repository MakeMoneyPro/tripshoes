<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\TicketRepositoryEloquent;
use App\Repositories\Eloquent\BlogDetailRepositoryEloquent;
use Exception;

class BlogController extends Controller
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
    public function index(){
    	$banner = false;
		$text_banner = '';
    	$tourinfos = $this->tourinforepo->with('images')->simplePaginate(6);
        foreach ($tourinfos as $key => $value) {
                $tourlist[]=$value;
                $image=$value['images']->first();
                $tourlist[$key]['image']=$image['url'];
            }
    	return view('frontend.blog',compact('tourlist','tourinfos','banner', 'text_banner'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article($id){
    	try {
            $tour = $this->tourinforepo->find($id);
            $images = $this->imagerepo->findByField('tour_information_id', $id);
            $image = $this->imagerepo->findByField('tour_information_id', $id)->first('url');
            $ticket = $this->ticketrepo->all();
            $blog =$this->blogdetailrepo->all();
            // dd($blog);
            $banner = false;
			$text_banner = "";
            return  view('frontend.article', compact('tour', 'ticket','images','blog','image','banner','text_banner'));
        } catch (Exception $ex) {
            return redirect()->route('trip');
        }
    }
}
