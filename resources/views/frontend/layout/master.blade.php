<!DOCTYPE html>
<html>
	<head>
		<title> {{trans('lang_user.souryz')}} @yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/intlTelInput.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/main.css') }}">
		@yield('header')
	</head>
	<body>

		@include('frontend.includes.header')
		<div class="clearfix"></div>
		<div id="content">
			@yield('content')
		</div>
		@include('frontend.includes.footer')

		<script type="text/javascript" src="{{ asset('/jquery/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/frontend/js/intlTelInput.js') }}"></script>
		<script type="text/javascript">
			var pathpromo = {!! json_encode(config('path.pathpromo')) !!};
		</script>
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script type="text/javascript" src="{{ asset('/frontend/js/checkout.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/frontend/js/custom.js') }}"></script>
		@yield('script')
	</body>
</html>
