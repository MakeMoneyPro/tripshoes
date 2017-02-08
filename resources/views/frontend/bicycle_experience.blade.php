@extends('frontend.layout.master')
@section('header')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-timepicker.min.css') }}">
@endsection
@section('content')
	<div class="container bacgound_no_login">
		<div class="back">
			<p><a href="{{ asset('/trip') }}"><i class="fa fa-chevron-left"></a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('lang_user.booking.back_to_trips') }}</p>
		</div>


			<div class="walking">
				<div class="row">
				<div class="col-md-5">
				 	<h4>{{ strtoupper($tour->transport) }}</h4>
				 	<h2>{{ $tour->userid->first_name }} {{ $tour->userid->last_name }}'s {{ $tour->transport}}</h2>
				 	<p>{{ $tour->about }}</p>
				 	<ul class="nav nav-tabs">
					  	<li class="active"><a data-toggle="tab" href="#about">{{ trans('lang_user.booking.about') }}</a></li>
					  	<li><a data-toggle="tab" href="#host">{{ trans('lang_user.booking.your_host') }}</a></li>
					  	<li><a data-toggle="tab" href="#reviews">{{ trans('lang_user.booking.reviews') }}</a></li>
					  	<li ><a data-toggle="tab" href="#locations">{{ trans('lang_user.booking.starting_location') }}</a></li>
					</ul>

					<div class="tab-content">
					  <div id="about" class="tab-pane fade in active">
					    <p>{{ $tour->about_tour }}</p>
					  </div>
					  <div id="host" class="tab-pane fade">
					    <p>{{ $tour->about_guide }}</p>
					  </div>
					  <div id="reviews" class="tab-pane fade">
					  	<p>{{ $tour->reviews }}</p>
					  </div>
					  <div id="locations" class="tab-pane fade">
					  	<p>
							<iframe width="100%" height="250" src="http://maps.google.com/maps?q={{$tour->lat}},{{$tour->lng}}&amp;&output=embed"></iframe>
					  		{{--<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$tour->lat}},{{$tour->lng}}&amp;key=AIzaSyDPMvvFFuqTMQHcqtSbSyTVuwBE7c52GB0"></iframe>--}}
					  	</p>
					  </div>
					</div>
				</div>
				<div class="col-md-7" style="height:420px;">
						<div class="col-md-8">
							<img src="{{ asset('upload/images/'.$image['url'].'') }}" class="img-round" width="100%" height="420px;">
						</div>
						<div class="col-md-3" style="height:420px;margin-left:50px;">
							@foreach($images as $item)
								<img src="{{ asset('upload/images/'.$item->url.'') }}" class="img-round" width="75%" height="23%" style="margin-bottom: 10px;">
							@endforeach
						</div>

				</div>
			</div>
		</div>
		<form action="{{ url('/addtocart/' . $id) }}" method="POST" style="margin-top: 60px;">
			<div class="row select_content">
				<div class="col-md-3">
					<div class="input-append date" data-date="Select Date">
					  <input class="form-control form_padding" id="datepciker" size="16" type="text" value="Select Date of Conferentce" name="date_booking">
					  <span class="add-on"><i class="icon-th"></i></span>
					</div>
				</div>
				<div class="col-md-3">
				<div class="input-group bootstrap-timepicker timepicker">
		            <input id="timepicker1" type="text" class="form-control form_padding input-small" name="time_booking">
		            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
		        </div>
		        </div>
				<div class="col-md-3">
					<select class="form-control form_padding" name="ticket_booking">
						@foreach($ticket as $ticket)
						<option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-3">
					<select class="form-control form_padding" name="number_ticket">
						@for($i=1;$i<=20;$i++)
						<option value="{{ $i }}">{{$i}}</option>
						@endfor
					</select>
				</div>
			</div>

		<span>${{number_format((float)$tour->price, 2, '.', '')}}</span>
		<input type="hidden" name="price" value="{{number_format((float)$tour->price, 2, '.', '')}}">
		<input type="hidden" name="promo_id" id="promo_id">
		@if(Auth::check())
		<div class="button_end">
			<button type="submit" class="btn btn-lg btn-success">{{ trans('lang_user.booking.add_to_cart') }}</button>
			<a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#promo_code">{{ trans('lang_user.booking.add_promo_code') }}</a>
		</div>
		@else
		<div class="button_end">
			<a href="#" class="btn btn-lg btn-warning">{{ trans('lang_user.booking.add_promo_code') }}</a>
		</div>
		@endif
		</form>
	</div>
	<div class="modal fade" id="promo_code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.booking.add_promo_code') }}</h4>
	      </div>
	      <div class="modal-body">
	      	<form action="" method="POST">
		      	<div class="form-group">
		      		<input type="hidden" name="_token" value="{{ Session::token() }}" />
		        	<label class="label-control" >{{ trans('lang_user.booking.promo_code') }}</label>
		        	<input type="text" id="promo" name="promo_id" class="form-control">
		        </div>
		    	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('lang_user.booking.close') }}</button>
	        <button type="button" class="btn btn-success" id="send_promo">{{ trans('lang_user.booking.send_promo_code') }}</button>
	      </div>
	    </div>
	  </div>
	</div>
@section('script')
	<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-timepicker.min.js') }}"></script>
	<script type="text/javascript">
        $('#timepicker1').timepicker();
        $('#datepciker').datepicker({
        	format: 'dd.mm.yyyy',
        });
    </script>
@endsection
@endsection
