<?php

function countBooking(){
    $bookings = App\Models\Booking::where('user_id', Auth::user()->id)
    							->where('status', 0)
    							->get();
	return count($bookings);
}