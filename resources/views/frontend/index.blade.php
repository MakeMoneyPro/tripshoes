@extends('frontend.layout.master')

@section('content')
	<div class="container">
		<div class="trip">
			<div class="text-center">
				<div class="col-lg-offset-1 col-lg-10 trip_header"><h1 class="">{{ trans('lang_user.index.content')}}<br>{{ trans('lang_user.index.content1')}}</h1></div>
				<div class="col-lg-12 info" style="padding:0px;"><p>{{ trans('lang_user.index.content_1')}}</p></div>
			
				<div class="col-lg-12 img-round bagia"></div>
				<div class="row" style="color: rgba(149, 165, 166,0.8);">
					<div class="col-lg-4">
						<div class="col-lg-3"><img src="{{ asset('frontend/images/Icon1.png')}}"></div>
						<div class="col-lg-9 align_left">

							<p><strong> {{ trans('lang_user.index.content_2')}}</strong><br>{{ trans('lang_user.index.content_3')}}</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="col-lg-3"><img src="{{ asset('frontend/images/Icon2.png')}}"></div>
						<div class="col-lg-9 align_left">

							<p><strong> {{ trans('lang_user.index.content_4')}}</strong><br>{{ trans('lang_user.index.content_5')}}</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="col-lg-3"><img src="{{ asset('frontend/images/Icon3.png')}}"></div>
						<div class="col-lg-9 align_left">

							<p><strong> {{ trans('lang_user.index.content_6')}}</strong><br>{{ trans('lang_user.index.content_7')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="row">
		<div class="gotchan text-center" style="color: #444444;">
			<img src="{{ asset('frontend/images/noun_145969.png') }}">
				<p>{{ trans('lang_user.index.content_8')}} <br> {{ trans('lang_user.index.content_8_1')}} </p><br>
				<p style="text-align:right;">{{ trans('lang_user.index.content_8_2')}}</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="app">
			<div class="row">
				<div class="col-lg-12">
					<img src="{{ asset('frontend/images/Icon11.png') }}">
				</div>
				<div class="col-lg-12 app_behind">
					<div class="col-lg-6">
						<h1>{{ trans('lang_user.index.content_9')}}</h1>
						<p>{{ trans('lang_user.index.content_10')}}</p>
						<p>{{ trans('lang_user.index.content_11')}}</p>
						<p>{{ trans('lang_user.index.content_12')}}</p>
					</div>
					<div class="col-lg-6">
						<div class="remarkable img-round "></div>
						<button class="btn btn-warning">View Sample Packages</button>
					</div>
				</div>
			</div>
			<h1 class="text-center">{{ trans('lang_user.index.content_13')}}</h1>
				<p id="app_end" style="margin-top: 30px;">{{ trans('lang_user.index.content_14')}}</p><br>
				<p id="app_end">{{ trans('lang_user.index.content_14_1')}}</p>
			<div class="col-lg-offset-2 col-lg-8 photobook"></div>
		</div>
	</div>
	<div class="giving">
		<!-- Begin A new form of giving -->
		<div class="container">
			<div class="col-lg-5 giving_content img-round">
				<div class="giving-info text-center">
					<h1> {{ trans('lang_user.index.content_15')}}</h1>
					<p> {{ trans('lang_user.index.content_16')}}</p>
					<p> {{ trans('lang_user.index.content_16_1')}}</p>
				</div>
			</div>
		</div>
	</div>
		<!-- End giving -->

		<!-- How to book -->
	<div class="book text-center">
		<h4>{{ trans('lang_user.index.content_17')}}</h4>
		<h1 style="color:#444444 !important;"> {{ trans('lang_user.index.content_18')}}</h1>
		<div class="container">
			<div class="row">
				<div class="book_content" style="color: rgba(149, 165, 166,0.8);">
					<div class="col-lg-4">
						<img src="{{ asset('frontend/images/noun_518813.png') }}">
						<h4> {{ trans('lang_user.index.content_19')}}</h4>
						<div class="col-lg-offset-1 col-lg-10">
							<p> {{ trans('lang_user.index.content_20')}}</p>
						</div>
					</div>
					<div class="col-lg-4">
						<img src="{{ asset('frontend/images/noun_75647.png') }}">
						<h4> {{ trans('lang_user.index.content_21')}}</h4>
						<div class="col-lg-offset-1 col-lg-10">
							<p> {{ trans('lang_user.index.content_22')}}</p>
						</div>
					</div>
					<div class="col-lg-4">
						<img src="{{ asset('frontend/images/noun_555024.png') }}">
						<h4> {{ trans('lang_user.index.content_23')}}</h4 >
						<div class="col-lg-offset-1 col-lg-10 ">
							<p> {{ trans('lang_user.index.content_24')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- End how to book -->

	<div class="photolauch"></div>
	<!-- Begin Launch -->
	<div class="col-lg-12 launch" style="color: #444444 !important;">
		<div class="col-lg-offset-1 col-lg-10 launch_content">
			<h3 class="text-center"> {{ trans('lang_user.index.content_25')}}</h3>
			<h1 class="text-center"> {{ trans('lang_user.index.content_26')}}</h1>
			<p class="text-center">{{ trans('lang_user.index.content_27')}}</p>
			<div style="width:20%; margin:0 auto;">
				<button class="btn btn-lg btn-success btn_login" style="width: 200px; align:center">{{ trans('lang_user.index.content_31')}}</button>
			</div>
		</div>
	</div>
	<div class="container">
		<!-- form -->
		<div class="col-lg-12 text-center form_send" id="form_send">
	       	<h1 class="text-center">{{ trans('lang_user.index.content_28')}}</h1>
	        <div class="col-lg-offset-1 col-lg-10 text-center">
	            {!! sendEnquire() !!}
	        </div>
	    </div>
	    <!-- end form -->
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
