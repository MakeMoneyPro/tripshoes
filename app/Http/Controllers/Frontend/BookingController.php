<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\BookingRepositoryEloquent;
use Auth;
use App\Models\Booking;
use Validator;

class BookingController extends Controller
{

	protected $userinfo;
    protected $bookinfo;
	public function __construct(UserRepositoryEloquent $userinfo, BookingRepositoryEloquent $bookinfo){
		$this->userinfo = $userinfo;
        $this->bookinfo = $bookinfo;
	}

    public function addtocart($id, Request $request){
        $date_booking = $request->get('date_booking');
        $date_booking = str_replace('.', '-', $date_booking);
        $date_booking = date('Y-m-d', strtotime($date_booking));
        $time_booking = $request->get('time_booking');
        $time_booking = date('Y-m-d H:i:s', strtotime($date_booking . $time_booking));
        $ticket_booking = $request->get('ticket_booking');
        $number_ticket = $request->get('number_ticket');
        $price = $request->get('price');
        $promo_id = $request->get('promo_id');
        $created_at = date('Y-m-d H:i:s');

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->date_start = $date_booking;
        $booking->start_time = $time_booking;
        $booking->tour_information_id = $id;
        $booking->ticket_id = $ticket_booking;
        $booking->number_ticket = $number_ticket;
        $booking->cost = $price * $number_ticket;
        $booking->promo_id = $promo_id;
        $booking->status = 0;
        $booking->date_created = $created_at;
        $booking->save();

        return redirect('/trip1');
    }

    public function updateCart(Request $request){
        $bookings = $this->bookinfo->findWhere([
                    'status' => 0,
                    'user_id' => Auth::user()->id
                ]);

        foreach($bookings as $booking){
            if($request->has('number_ticket_' . $booking->id)){
                $number_ticket = $request->get('number_ticket_' . $booking->id);
                $price = $request->get('price_' . $booking->id);
                $book = $this->bookinfo->findByField('id', $booking->id)->first();
                $book->cost = $price;
                $book->number_ticket = $number_ticket;
                $book->save();
            }
        }
        return redirect('/trip2');
    }

    public function deleteBooking(Request $request){
        $id = $request->get('id');
        Booking::find($id)->delete();
    }

    public function trip1(Request $request){
        $bookings = $this->bookinfo->findWhere([
                    'status' => 0,
                    'user_id' => Auth::user()->id
                ]); 
        $total = 0;

        foreach($bookings as $booking){
            if($booking->status == 0){
                $total += $booking->cost * $booking->number_ticket;
            }
        }

    	$banner = false;
		$text_banner = '';
		return view('frontend.trips_checkout_1', compact('banner', 'text_banner', 'bookings', 'total'));
    }

    public function trip2(){
        $banner = false;
        $text_banner = '';
        return view('frontend.trips_checkout_2', compact('banner', 'text_banner'));

    }

    public function posttrip2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|unique:tbl_user,email',
            'age'       => 'required',
            'password'  => 'required',
            'country'   => 'required',
            'code'      => 'required'

        ]);
        $data=$request->all();
        $result= $this->userinfo->update($data,Auth::id());
        return redirect('/trip3');
    }
    public function trip3(Request $request){
    	$banner = false;
			
		$text_banner = '';
    	return view('frontend.trips_checkout_3', compact('banner', 'text_banner'));
    }
}
