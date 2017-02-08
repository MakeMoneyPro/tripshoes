@extends('frontend.layout.master')

@section('content')
	<div class="container bacgound_no_login">
		<div class="back">
			<p><a href="{{ asset('/trip') }}"><i class="fa fa-chevron-left"></a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('lang_user.booking.back_to_trips') }}</p>
		</div>

		<div class="row">
			<div class="col-md-12 walking">
				<div class="col-md-5">
				 	<h4>{{ strtoupper($bookings->tourinformations->transport) }}</h4>
				 	<h2>{{ $bookings->users->first_name }} {{ $bookings->users->last_name }}'s {{ $bookings->tourinformations->transport}}</h2>
				 	<p>{{ $bookings->about }}</p>
				 	<ul class="nav nav-tabs">
					  	<li class="active"><a data-toggle="tab" href="#about">{{ trans('lang_user.booking.about') }}</a></li>
					  	<li><a data-toggle="tab" href="#host">{{ trans('lang_user.booking.your_host') }}</a></li>
					  	<li><a data-toggle="tab" href="#reviews">{{ trans('lang_user.booking.reviews') }}</a></li>
					  	<li ><a data-toggle="tab" href="#locations">{{ trans('lang_user.booking.starting_location') }}</a></li>
					</ul>

					<div class="tab-content">
					  <div id="about" class="tab-pane fade in active">
					    <p>{{ $bookings->tourinformations->about_tour }}</p>
					  </div>
					  <div id="host" class="tab-pane fade">
					    <p>{{ $bookings->tourinformations->about_guide }}</p>
					  </div>
					  <div id="reviews" class="tab-pane fade">
					  	<p>{{ $bookings->tourinformations->reviews }}</p>
					  </div>
					  <div id="locations" class="tab-pane fade">
					  	<p>
					  		<iframe width="100%" height="250" src="http://maps.google.com/maps?q={{$bookings->tourinformations->lat}},{{$bookings->tourinformations->lng}}&amp;&output=embed"></iframe>
					  		{{--<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$bookings->tourinformations->lat}},{{$bookings->tourinformations->lng}}&amp;key=AIzaSyDPMvvFFuqTMQHcqtSbSyTVuwBE7c52GB0"></iframe>--}}
					  	</p>
					  </div>
					</div>				
				</div>
				<div class="col-md-7">
					<div class="col-md-8">	
						<img src="{{ asset('upload/images/'.$image['url'].'') }}" class="img-round" width="100%" height="420px;">
					</div>
					<div class="col-md-4 img_right">
						@foreach($images as $item)
						<div class="col-md-10">
							<img src="{{ asset('upload/images/'.$item->url.'') }}" class="img-round" width="90%" >
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row booking_content">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">{{ trans('lang_user.booking.date_of_trip') }}</label>
					<input type="text" class="form-control form_padding" value="{{ $bookings->date_start}}">
				</div>
			</div>
			<div class="col-md-4">
				<label class="control-label">{{ trans('lang_user.booking.time') }}</label>
					<input type="text" class="form-control form_padding" value="{{ $bookings->start_time }}">
			</div>
		</div>
		<div class="row booking_content">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">{{ trans('lang_user.booking.number_of_tickets') }}</label>
					<input type="text" class="form-control form_padding" value="{{ $bookings->number_ticket }}">
				</div>
			</div>
			<div class="col-md-4">
				<label class="control-label">{{ trans('lang_user.booking.trip_type') }}</label>
				<input type="text" class="form-control form_padding" value="{{ $bookings->tickets->name }}">
			</div>
		</div>
		<p class="book_end">{{ trans('lang_user.booking.note') }}</p>
	</div>
@endsection