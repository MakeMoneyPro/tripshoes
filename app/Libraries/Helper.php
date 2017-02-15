<?php
use App\Models\TourInformation;

function countBooking(){
    $bookings = App\Models\Booking::where('user_id', Auth::user()->id)
    							->where('status', 0)
    							->get();
	return count($bookings);
}

function selectDelegates(){
	$html = "";
	$html .= "<option value=\"0-30\">0-30</option>
				<option value=\"31-70\">31-70</option>
				<option value=\"71-120\">71-120</option>
				<option value=\"120-200\">120-200</option>
				<option value=\"200+\">200+</option>";
	return $html;
}

function sendEnquire(){
	$tours = TourInformation::all();
	$html = "";
	$html .= '<form class="form_access" method="POST" action=' . url('/getEarlyAccess') . '>
                 <div class="row">
                  <div class="col-lg-6">
                   <div class="form-group">
                        <input type="text" name="youname" class="form-control form_padding input-lg" placeholder="Your name" width="100%">
                    </div>
                   </div>
                   <div class="col-lg-6">
                    <div class="form-group">
                        <input type="email" class="form-control form_padding input-lg" name="email" placeholder="E-mail" width="100%">
                    </div>
                   </div>
                 </div>
             <div class="row">
                  <div class="col-lg-6">
                   <div class="form-group">
                        <input class="form-control form_padding input-lg" id="datepciker" type="text" placeholder=' . trans('lang_user.index.content_29') . 'name="date_booking">
                    </div>
                   </div>
                   <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control form_padding input-lg" name="delegate">
                         <option value="">' . trans('lang_user.index.content_32') . '</option>' . 
                         selectDelegates() . '
                        </select>
                    </div>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-lg-6">
                   <div class="form-group">
                        <select class="form-control form_padding input-lg" name="package">
                         <option value="">' . trans('lang_user.index.content_33') . '</option>';

                     	foreach($tours as $tour){
                     		$html .= '<option value="' . $tour->name . '">' . $tour->name . '</option>';
                     	}

                $html .= '</select>
                    </div>
                   </div>
                   <div class="col-lg-6">
                   <div class="form-group">
                        <select class="form-control form_padding input-lg" name="country">
                         <option value="">' . trans('lang_user.index.content_34') . '</option>
                         <option value="USA">USA</option>
                         <option value="Australia">Australia</option>
                         <option value="UK">UK</option>
                         <option value="Vietnam">Vietnam</option>
                         <option value="Other">Other</option>
                        </select>
                    </div>
                   </div>
                 </div>
                 <button class="btn btn-lg btn_login col-lg-12 form_padding">'. trans('lang_user.index.end') . '</button>
             </form>';
     return $html;
}