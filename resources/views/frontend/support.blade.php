@extends('frontend.layout.master')

@section('content')
	<div class="support">
		<h1 class="text-center">{{trans('lang_user.support.support_header')}}</h1>
		<ul class="support-step">
			<li>
				<div class="row">
					<div class="col-lg-1">
						<span class="border-number">{{trans('lang_user.support.1')}}</span>
					</div>
					<div class="col-lg-10">
						<h4>{{trans('lang_user.support.support_1')}}</h4>
					</div>
					<div class="col-lg-1">
						<span class="pull-right sign">+</span>
					</div>
				</div>
				
			</li>
			<li>
				<div class="row">
					<div class="col-lg-1">
						<span class="border-number">{{trans('lang_user.support.2')}}</span>
					</div>
					<div class="col-lg-10">
						<h4>{{trans('lang_user.support.support_2')}}</h4>
					</div>
					<div class="col-lg-1">
						<span class="pull-right sign">+</span>
					</div>
				</div>
			</li>
			<li>
				<div class="row">
					<div class="col-lg-1">
						<span class="border-number">{{trans('lang_user.support.3')}}</span>
					</div>
					<div class="col-lg-10">
						<h4>{{trans('lang_user.support.support_3_1')}}</h4>
						<p>{{trans('lang_user.support.support_3_2')}}</p>
					</div>
					<div class="col-lg-1">
						<span class="pull-right sign">+</span>
					</div>
				</div>
				
			</li>
			<li>
				<div class="row">
					<div class="col-lg-1">
						<span class="border-number">{{trans('lang_user.support.4')}}</span>
					</div>
					<div class="col-lg-10">
						<h4>{{trans('lang_user.support.support_4')}}</h4>
					</div>
					<div class="col-lg-1">
						<span class="pull-right sign">+</span>
					</div>
				</div>
			</li>
		</ul>
				
@endsection
