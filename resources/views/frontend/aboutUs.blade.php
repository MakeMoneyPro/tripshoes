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
		<div class="col-lg-12 about_us_end">
			<div class="col-lg-offset-2 col-lg-8 text-center">
				<img src="{{ asset('frontend/images/Icon15.png') }}">
				<p> {{ trans('lang_user.about.about_end') }}</p>
			</div>
		</div>
	</div>
</div>
@endsection