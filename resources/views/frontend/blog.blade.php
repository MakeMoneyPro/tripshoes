@extends('frontend.layout.master')

@section('content')
<div class="blog_header">
<div class="container">
	<h2 class="text-center blog_welcome">{{ trans('lang_user.blog.blog_header') }}</h2>
	<div class="row">
		<div class="col-md-12">
			@foreach($tourlist as $item)
			<div class="col-md-4 blog_info">
				<a href="{{ route('blog.article',$item->id) }}">
					<div style="background: url('frontend/images/{{ $item->image }}');width: 100%;height: 200px;background-size: 120%;background-position: -60px -10px;border-top: 1px white;border-radius: 10px 10px 0px 0px;"></div>
				</a>
				<div class="blog_text">
				<h3>{{ substr($item->name, 0,20) }}{{ strlen($item->about)>50 ? " ..." : ""}}</h3>
				<p>{{ substr($item->about, 0,150) }}{{ strlen($item->about)>150 ? " ..." : ""}}</p>
				</div>
			</div>
			@endforeach
			<div class="text-center col-lg-12">{!! $tourinfos->render() !!}</div>
		</div>
	</div>
</div>
</div>
@endsection
