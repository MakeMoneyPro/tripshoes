<div id="footer">
	<div class="container">
		<div class="top">
			<div class="pull-left webname">
				<a href="{{ asset('/') }}"><img src="{{ asset('frontend/images/Group3.png') }}"></a>
				{{ trans('lang_user.footer.trip') }}<span>{{ trans('lang_user.footer.shoes') }}</span>
			</div>
			<div class="pull-right">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="text-center footer_end">
				<ul>
					<li><a href="{{ asset('/about') }}">{{ trans('lang_user.footer.about') }}</a></li>
					<li><a href="{{ asset('/sendusemail')}}">{{ trans('lang_user.footer.contact') }}</a></li>
					<li><a href="{{ asset('/support') }}">{{ trans('lang_user.footer.support') }}</a></li>
				</ul>
			</div>
			<div class="border"></div>
		</div>

	</div>
	<div class="text-center copyright">
		<strong>{{ trans('lang_user.footer.copy_right') }}</strong>
	</div>
</div>
