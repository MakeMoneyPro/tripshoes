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
				 	<h4> {{ strtoupper($tour->address) }} | {{ strtoupper($tour->time_period) }} DAYS</h4>
				 	<h2>{{ $tour->name}}</h2>
				 	<p>{{ $tour->about }}</p>
				 	<ul class="nav nav-tabs">
					  	<li class="active"><a data-toggle="tab" href="#about">{{ trans('lang_user.booking.about') }}</a></li>
					  	<li><a data-toggle="tab" href="#host">{{ trans('lang_user.booking.facilitator') }}</a></li>
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
				<div class="col-md-7">
						<div class="col-md-8">
							<img src="{{ asset('frontend/images/'.$image['url'].'') }}" class="img-round" width="100%" height="420px;">
						</div>
						<div class="col-md-3" style="height:420px;margin-left:40px; align: center">
							@foreach($images as $item)
								<img src="{{ asset('frontend/images/'.$item->url.'') }}" class="img-round" id="image_right"><br>
							@endforeach
						</div>
				</div>
			</div>
		</div>
		<form action="{{ url('/enquire') }}" method="POST" style="margin-top: 60px;">
			<input type="hidden" value="{{ $tour->name }}" name="package">
			<div class="row select_content">
				<div class="col-md-3">
					<div class="input-append date" data-date="Select Date">
					  <input class="form-control form_padding" id="datepciker" size="16" type="text" value="{{ trans('lang_user.booking.conference') }}" name="date_booking">
					  <span class="add-on"><i class="icon-th"></i></span>
					</div>
				</div>
				<div class="col-md-3">
					<select class="form-control form_padding" name="delegates">
						<option>{{ trans('lang_user.booking.delegate') }}</option>
						{!! selectDelegates() !!}
					</select>
		        </div>
				<div class="col-md-3">
					<select class="form-control form_padding" name="speaker">
						<option> {{ trans('lang_user.booking.speaker') }}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select class="form-control form_padding" name="level">
						<option> {{ trans('lang_user.booking.level') }}</option>
						<option value="1-3 stars">1-3 stars</option>
						<option value="4 stars">4 stars</option>
						<option value="5 stars">5 stars</option>
					</select>
				</div>
			</div>

		<span>${{number_format((float)$tour->price, 2, '.', '')}} {{ trans('lang_user.booking.approx') }}</span>
		<input type="hidden" name="price" value="{{number_format((float)$tour->price, 2, '.', '')}}">
		<input type="hidden" name="promo_id" id="promo_id">
		@if(Auth::check())
		<div class="button_end">
			<button type="submit" class="btn btn-lg btn-success">{{ trans('lang_user.booking.add_to_cart') }}</button>
			<!-- <a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#promo_code">{{ trans('lang_user.booking.add_promo_code') }}</a> -->
		</div>
		@else
		<div class="button_end">
			<a data-toggle="modal" data-target="#signin1" class="btn btn-lg btn-warning">{{ trans('lang_user.booking.add_promo_code') }}</a>
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
