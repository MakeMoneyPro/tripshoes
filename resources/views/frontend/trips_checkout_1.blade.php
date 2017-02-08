@extends('frontend.layout.master')

@section('content')
	
	<div class="checkout">
		<div class="cart-title">
			<h3 class="text-left">Cart</h3>						
		</div>
		<form action="{{ url('/updateCart') }}" method="POST">
			<div class="info-cart">
				<div>
					@if(count($bookings) > 0)
						@foreach($bookings as $booking)
						<div class="cart_{{ $booking->id }}">
							<div class="row">
								<div class="col-lg-1 text-center">
									<div class="cancel"><a href="{{ url('/deleteBooking') }}" name="deleteBooking" delete-id="{{ $booking->id }}">&times;</a></div>
								</div>
								<div class="col-lg-2">
									<div class="img-checkout"></div>
								</div>
								<div class="col-lg-4">
									<div class="tour_name">
										@if($booking->tour_id == $booking->tourinformations->id)
											<p>{{ $booking->tourinformations->name }}</p>
										@endif
										
										<span>{{ date('d.m.yy', strtotime($booking->date_start)) }}|{{ date('h:i A', strtotime($booking->start_time)) }}</span>
									</div>
								</div>
								<div class="col-lg-3 text-center">
									<p class="number_ticket">
										<a href="#" class="plus" data-id="{{ $booking->id }}">
											<span class="sign-cart">+</span>
										</a>
										<span class="ticket">{{ $booking->number_ticket }}</span> 
										<input type="hidden" name="number_ticket_{{ $booking->id }}" id="number_ticket_{{ $booking->id }}" value="{{ $booking->number_ticket }}">
										<a href="#" class="minus" data-id="{{ $booking->id }}">
											<span class="sign-cart">-</span>
										</a>
									</p>
								</div>
								<div class="col-lg-2">
									<div class="price">
										<span class="price">${{ $booking->cost }}</span>
										<div class="hidden one_price_{{ $booking->id }}">{{ $booking->cost }}</div>
										<input type="hidden" name="price_{{ $booking->id }}" id="price_{{ $booking->id }}" value="{{ $booking->cost }}">
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>

			<div class="info-cart"> 
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-2"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-3"></div>
					<div class="col-lg-2">
						<span class="total-payment">${{ $total }}</span>
						<input type="hidden" name="total">
					</div>
					
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 btn-group ">
				  	<a href="{{ asset('/tripsnologin') }}" class="btn btn-default btn-lg-5 return">Return to Shopping</a>
					<button class="btn btn-lg-7 btn-default continue" type="submit">Continue Customer Detail <i class="fa fa-arrow-right"></i></button>
				</div>
			</div>
			
		</form>
	</div>
	
@endsection