
<div id="header" class="{!! $banner ? 'has-banner' : 'no-banner' !!}" style="background: url({{ asset($banner) }}) no-repeat; background-size: 100%;">
	<div class="container">
		<div class="top">
			<div class="pull-left">
				<div class="link">
					<a href="{{ asset('/trip') }}">{{ trans('lang_user.header.trips') }}</a>
					<a href="{{ asset('/blog') }}" class="padding_left_10">{{ trans('lang_user.header.blog') }}</a>
				</div>
			</div>
			@if(!Auth::check())
				@if(Session::has('sendSuccess'))
					<div class="modal fade" id="sendcode" tabindex="-1" role="dialog" aria-labelledby="sendcode" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size:16px;">&times;</button>
					      </div>
					      <div class="modal-body">
					        <h3>{{ Session::get('sendSuccess') }}</h3>
					      </div>
					    </div>
					  </div>
					</div>
				@endif
				<div class="pull-right">
					<div class="link">
						<a href="#" data-toggle="modal" data-target="#signin1">{{ trans('lang_user.header.sign_in') }}</a>
						{{---<a href="{!! asset('/') !!}"><i class="fa fa-shopping-cart padding_left_10"></i>{{ trans('lang_user.header.cart') }}</a>--}}
					</div>
				</div>
				<div class="modal fade" id="signin1" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">
				  <div class="modal-dialog modal-md">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.sign_in') }}</h4>
				      </div>
				      <div class="modal-body modal_login">


				        <p>{{ trans('lang_user.header.sign_in_here') }}</p>
				        <form action="{{ url('/postLogin') }}" method="POST" id="formsignin">
				       		<span class="errors hidden"></span>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" name="email" placeholder="Email" id="email">
				        	</div>
				        	<div class="form-group">
				        		<input type="password" class="form-control form_padding" name="password" placeholder="Password" id="password">
				        	</div>
				        	<div>
				        	<div class="pull-left">
				        		<input type="checkbox" name="remember"> {{ trans('lang_user.header.remember_me') }}
				        	</div>
				        	<div class="pull-right">
				        		<a href="#" data-toggle="modal" data-target="#resetpassword" data-dismiss="modal">{{ trans('lang_user.header.forgot_password') }}</a>
				        	</div>
				        	</div>
				        	<div class="clearfix"></div>
				        	<input type="submit" value="Sign In" class="btn btn-lg btn-success btn_login">
				        </form>
				        <a href="{{ url('/sendusemail') }}">{{ trans('lang_user.header.access_code') }}</a>
				      </div>

				    </div>
				  </div>
				</div>

				<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
					  <div class="modal-dialog modal-sm">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.index.reset_password') }}</h4>
					      </div>
					      <div class="modal-body">
					       	<form method="POST" action="{{ url('/postResetPassword') }}" id="formResetPassword">
					       		{{ csrf_field() }}
					       		<div class="form-group">
					        		<input type="text" class="form-control form_padding" placeholder="Email" name="email" id="email">
					        	</div>
					        	<div class="form-group">
					        		<input type="text" class="form-control form_padding" placeholder="Access Code" name="access_code" id="access_code">
					        	</div>
					       		<div class="form-group">
					        		<input type="password" class="form-control form_padding" placeholder="Password" name="password" id="password">
					        	</div>
					        	<div class="form-group">
					        		<input type="password" class="form-control form_padding" placeholder="Confirm password" name="confirm_password" id="confirm_password">
					        	</div>
					        	<input type="submit" value="Submit" class="btn btn-lg btn-success btn_login">
					       	</form>
					      </div>

					    </div>
					  </div>
					</div>

				<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="resetpassword" aria-hidden="true">
				  <div class="modal-dialog">
				  		<div class="modal-content">
					    <form action="{{ url('/sendEmailChangePassword') }}" method="POST" id="formresetpassword">
						      <div class="modal-body modal_login">
						        <p>{{ trans('lang_user.header.email_reset') }}</p>

						        	<div class="form-group">
						        		<input type="text" class="form-control form_padding" name="email" id="email" placeholder="Email">
						        	</div>
						        </div>
						      <div class="modal-footer">
						      	<div class="pull-right">
						      		<a href="#" data-toggle="modal" data-target="#signin1" data-dismiss="modal" class="btn btn-lg btn-danger">{{ trans('lang_user.header.back') }}</a>
						      		<input type="submit" value="Send Email" class="btn btn-success btn-lg" style="background-color: #99CC33; ">
						      	</div>

						      </div>
					      </form>

				    </div>
				  </div>
				</div>
				<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.access_code_send') }}</h4>
				      </div>
				      <div class="modal-body">
				       	<form method="POST" action="{{ url('/postRegister') }}" id="signupform">
				       		{{ csrf_field() }}
				       		<span class="errors hidden"></span>
				       		<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Name" name="name" id="name">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Email" name="email" id="email">
				        	</div>
				        	<div class="form-group">
				        		<input type="password" class="form-control form_padding" placeholder="Password" name="password" id="password">
				        	</div>
				        	<div class="form-group">
				        		<input type="number" class="form-control form_padding" placeholder="Age" name="age" id="age">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Country of Residence" name="country" id="country">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Access Code" name="code" id="code">
				        	</div>
				        	<input type="submit" value="Get me access" class="btn btn-lg btn-success btn_login">
				       	</form>
				      </div>

				    </div>
				  </div>
				</div>
				<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">{{ trans('lang_user.header.access_code_send') }}</h4>
				      </div>
				      <div class="modal-body">
				       	<form method="POST" action="{{ url('/postRegister') }}" id="signupform">
				       		{{ csrf_field() }}
				       		<span class="errors hidden"></span>
				       		<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Name" name="name" id="name">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Email" name="email" id="email">
				        	</div>
				        	<div class="form-group">
				        		<input type="password" class="form-control form_padding" placeholder="Password" name="password" id="password">
				        	</div>
				        	<div class="form-group">
				        		<input type="number" class="form-control form_padding" placeholder="Age" name="age" id="age">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Country of Residence" name="country" id="country">
				        	</div>
				        	<div class="form-group">
				        		<input type="text" class="form-control form_padding" placeholder="Access Code" name="code" id="code">
				        	</div>
				        	<input type="submit" value="Get me access" class="btn btn-lg btn-success btn_login">
				       	</form>
				      </div>

				    </div>
				  </div>
				</div>



				@else
				<div class="link">
					<ul class="nav-right pull-right list-inline">
						{{--<li><a href="{{ route('booking.index') }}">{{ trans('lang_user.header.my_booking') }}</a></li>
						<li>
							<a href="{{ url('/trip1') }}"><i class="fa fa-shopping-cart"></i>{{ trans('lang_user.header.cart') }}<span class="badge">{{ countBooking() }}</span></a>
						</li>--}}
						<li class="dropdown pull-right">
							<a href class="dropdown-toggle" data-toggle="dropdown">
								@if(Auth::user()->avatar)
									<div class="ava-info" style="background: url({{ asset(config('path.avatar_view').Auth::user()->avatar) }});background-size: cover;" class="img-circle img-responsive"></div>
								@else
									<div class="ava-info" style="background: url({{ asset(config('path.profile_default')) }});background-size: cover;" class="img-circle img-responsive"></div>
								@endif
							</a>

							<ul class="dropdown-menu pull-right with-arrow panel panel-default littleFadeInUp" role="menu">

				                <li>
				                    <a role="button" href="{{ url('/profile') }}">
				                        <i class="fa fa-user"></i>{{ trans('lang_user.header.profile') }}
				                    </a>
				                </li>
				                <li>
				                    <a role="button">
				                        <i class="fa fa-cog"></i>{{ trans('lang_user.header.account') }}
				                    </a>
				                </li>
				                <li>
				                    <a role="button" href="{{ url('/logout') }}" tabindex="0">
				                        <i class="fa fa-sign-out"></i>{{ trans('lang_user.header.logout') }}
				                    </a>
				                </li>

				            </ul>

						</li>

					</ul>

				</div>

				@endif

				</div>
				<div class="text-center webname">
					<a href="{{ url('/') }}" style="color:#fff;"><img src="{{ asset('frontend/images/Logo.png') }}">&nbsp;{{ trans('lang_user.header.trip') }}<span>{{ trans('lang_user.header.shoes') }}</span></a>

				</div>
				{!! $text_banner !!}
	</div>
</div>
