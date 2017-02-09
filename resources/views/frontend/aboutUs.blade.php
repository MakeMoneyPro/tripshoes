@extends('frontend.layout.master')

@section('content')
<div class="about_us">
	<div class="container">
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6">
			<h5 class="text-center">{{ trans('lang_user.about.a_few_words') }}</h5>
			<h1 class="text-center">{{ trans('lang_user.about.about_us') }}</h1>
			<p class="text-center"> {{ trans('lang_user.about.about_header') }}</p>
			<div class="text-center"><button class="btn btn-lg btn-default contact_link">{{ trans('lang_user.about.contact_us') }}</button></div>
		</div>
	</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 about_us_middle">
			<div class="col-lg-12 text-center">
				<h1>{{ trans('lang_user.about.the_team') }}</h1>
				<p> {{ trans('lang_user.about.yes') }}</p>
			</div>

			<div class="col-lg-12 text-center about_us_middle_2">
				<div class="col-lg-4 ">
					<img src="{{ asset('frontend/images/Image21.png') }}">
					<h3>{{ trans('lang_user.about.name_1') }}</h3>
					<h4>{{ trans('lang_user.about.middle_1') }}</h4>
					<h5>{{ trans('lang_user.about.description_1') }}</h5>
					<h5>{{ trans('lang_user.about.description_1_1') }}</h5>
				</div>
				<div class="col-lg-4">
					<img src="{{ asset('frontend/images/Image22.png') }}">
					<h3>{{ trans('lang_user.about.name_2') }}</h3>
					<h4>{{ trans('lang_user.about.middle_2') }}</h4>
					<h5>{{ trans('lang_user.about.description_2') }}</h5>
					<h5>{{ trans('lang_user.about.description_2_1') }}</h5>
					<h5>{{ trans('lang_user.about.description_2_2') }}</h5>
				</div>
				<div class="col-lg-4">
					<img src="{{ asset('frontend/images/Image23.png') }}">
					<h3>{{ trans('lang_user.about.name_3') }}</h3>
					<h4>{{ trans('lang_user.about.middle_3') }}</h4>
					<h5>{{ trans('lang_user.about.description_3') }}</h5>
					<h5>{{ trans('lang_user.about.description_3_1') }}</h5>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 about_us_end">
			<div class="col-lg-offset-2 col-lg-8 text-center">
				<img src="{{ asset('frontend/images/Icon15.png') }}">
				<p> {{ trans('lang_user.about.about_end') }}</p>
			</div>
		</div>
	</div>
</div>
@endsection
