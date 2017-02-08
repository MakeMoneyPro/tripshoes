@extends('frontend.layout.master')

@section('content')

	<div class="trip2">
		<form action="{{ asset('/trip2') }}" method="POST">
		<div class="trip2-content">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group trip_content edit_image">
						<h3>{{ trans('lang_user.trip.trip2_header') }}</h3>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="pull-right">
						<img src="{{ asset('frontend/images/Image20.png') }}" class="showPlay img-rounded"><br>
						<!-- @if(Auth::user()->avatar)
							<div class="showPlay" style="background: url({{ asset(config('path.avatar_view').Auth::user()->avatar) }})" class="img-circle img-responsive"></div>
						@else
							<div class="showPlay" style="background: url({{ asset(config('path.profile_default').Auth::user()->avatar) }})" class="img-circle img-responsive"></div>
						@endif	 -->
					</div>
				</div>
			</div>
				<div class="form-group trip_content">
					<label >{{ trans('lang_user.trip.e-mail') }}</label>
					<input type="emai" name="emai" class="form-control form_padding" required>
				</div>
				<h3 id="detail">{{ trans('lang_user.trip.detail') }}</h3>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label> {{ trans('lang_user.trip.first_name') }}</label>
							<input type="text" name="first_name" class="form-control form_padding" required>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label> {{ trans('lang_user.trip.last_name') }}</label>
							<input type="text" name="last_name" class="form-control form_padding" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label> {{ trans('lang_user.trip.country_of_residence') }}</label>
							<input type="text" name="country" class="form-control form_padding">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label> {{ trans('lang_user.trip.age') }}</label>
							<input type="text" name="age" class="form-control form_padding">
						</div>
					</div>
				</div>	
				
		</div>
		<div class="btn-group btn_trip2">
				  	<a href="{{ asset('/trip') }}" class="btn btn-lg-6 btn_addtravel">{{ trans('lang_user.trip.add_traveller') }}</a>
					<button type="submit" class="btn btn-lg complete">{{ trans('lang_user.trip.to_payment') }} <i class="fa fa-arrow-right"></i></button>
				</div>
		</form>
	</div>
@endsection