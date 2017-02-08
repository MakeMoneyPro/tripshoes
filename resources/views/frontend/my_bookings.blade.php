@extends('frontend.layout.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 my_booking">
			<div class="col-lg-12 text-center "><h1>{{ trans('lang_user.header.my_booking') }}</h1></div>
			@foreach($bookings as $item)
			@if(strtotime(date('Y-m-d',strtotime($item->finish_time))) > strtotime(date('Y-m-d')))
			<div class="row">

				<div class="col-lg-6 my_booking">
					<a href="{{ route('booking.show',$item->id) }}">
					<div style="background: url(upload/images/{{$item->image}}) no-repeat; background-size:cover;background-position: -140px;" class="tripclass img-rounded">
					</div>
					</a>
					<h2 class="text-center"> {{ $item->users->first_name }} {{ $item->users->last_name }}'s</h2>
					<a href="{{ route('booking.show',$item->id) }}"><h2 class="text-center"> {{ $item->tourinformations->name }}</h2></a>
					<p class="text-center">${{number_format((float)$item->tourinformations->price, 2, '.', '')}} | {{$item->tourinformations->time_period}}mins | {{ $item->tourinformations->transport }}</p>
				</div>
				
			</div>
			@endif
			@endforeach
			<div class="col-lg-12 text-center "><h1>{{ trans('lang_user.booking.past_booking') }}</h1></div>
			@foreach($bookings as $item)
			@if(strtotime(date('Y-m-d',strtotime($item->finish_time))) <= strtotime(date('Y-m-d')))
			<div class="row">
				<div class="col-lg-6 my_booking">
					<a href="{{ route('booking.show',$item->id) }}">
					<div style="background: url(upload/images/{{$item->image}}) no-repeat; background-size:cover;background-position: -140px;" class="tripclass img-rounded">
					</div>
					</a>
					<h2 class="text-center"> {{ $item->users->first_name }} {{ $item->users->last_name }}'s</h2>
					<a href="{{ route('booking.show',$item->id) }}"><h2 class="text-center"> {{ $item->tourinformations->name }}</h2></a>
					<p class="text-center">${{number_format((float)$item->tourinformations->price, 2, '.', '')}} | {{$item->tourinformations->time_period}}mins | {{ $item->tourinformations->transport }}</p>
				</div>
			</div>
			@endif
			@endforeach
		</div>			
	</div>
</div>
@endsection