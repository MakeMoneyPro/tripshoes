<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\BookingRepositoryEloquent;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\TicketRepositoryEloquent;
use App\Repositories\Eloquent\PromoRepositoryEloquent;
use App\Repositories\Eloquent\TravellerRepositoryEloquent;
use App\Repositories\Eloquent\InvoiceRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use Auth;
use Exception;
class MyBookingController extends Controller
{
	protected $bookingrepo;
    protected $tourinforepo;
    protected $ticketrepo;
    protected $promorepo;
    protected $travellerrepo;
    protected $invoicerepo;
    protected $imagerepo;
    /**
     * Create a new authentication controller instance.
     *
     * @param TourInformationRepositoryEloquent       $tourinfo      the tourinfo repository
     * @param BookingRepositoryEloquent       $image      the image repository
     * @param TicketRepositoryEloquent       $ticket      the ticket repository
     * @param PromoRepositoryEloquent       $promo      the promo repository
     * @param ImageRepositoryEloquent       $image      the image repository
     * @param TravellerRepositoryEloquent       $traveller      the traveller repository
     * @param InvoiceRepositoryEloquent       $invoice      the invoice repository
     *
     * @return void
     */
    public function __construct(BookingRepositoryEloquent $booking,ImageRepositoryEloquent $image, TourInformationRepositoryEloquent $tourinfo, TicketRepositoryEloquent $ticket, PromoRepositoryEloquent $promo, TravellerRepositoryEloquent $traveller, InvoiceRepositoryEloquent $invoice)
    {
        $this->tourinforepo = $tourinfo;
        $this->imagerepo = $image;
        $this->bookingrepo = $booking;
        $this->ticketrepo = $ticket;
        $this->promorepo = $promo;
        $this->travellerrepo = $traveller;
        $this->invoicerepo = $invoice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$banner = false;
		$text_banner = '';
        $bookings =$this->bookingrepo->findByField('user_id',Auth::id());
        foreach ($bookings as $key => $value) {
            $image = $this->imagerepo->findByField('tour_information_id', $value->tour_information_id)->first();
            $bookings[$key]['image']=$image['url'];
        }
		return view('frontend.my_bookings', compact('banner', 'text_banner','bookings'));
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
            $bookings = $this->bookingrepo->find($id);
            $images = $this->imagerepo->findByField('tour_information_id', $bookings->tour_information_id);
            $image = $this->imagerepo->findByField('tour_information_id', $bookings->tour_information_id)->first();
            $banner = false;
            $text_banner = "";
            return  view('frontend.bicycle_booking', compact('bookings','images','image','banner','text_banner'));
        } catch (Exception $ex) {
            return redirect()->route('booking.index');
        }
    }

    public function comparepromo(Request $request){
        $data = $request->all();
        $promo = $this->promorepo->findByField('code',$request->promo)->first();
        if($promo) {
            return response()->json([
                'promo' => $promo,
                'code' => 1
            ]);
        }
        else{
            return response()->json([
                'mes' => 'Promo code is not exist, please help me check it. Thank you',
                'code' => 0
            ]);
        }
        
    }
}
