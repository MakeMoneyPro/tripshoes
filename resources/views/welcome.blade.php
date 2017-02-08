@extends('frontend.layout.master')

@section('content')
    <h1 class="text-center" >{{ trans('frontend.home.send_us_email') }}</h1>
    <h3 class="text-center col-lg-offset-3 col-lg-6" >{{ trans('frontend.home.text') }}</h3>
    <div class="col-lg-12">
        <div class="col-lg-offset-2 col-lg-8" align="center">
            <form class="form-inline">
                <div class="form-group col-lg-12">
                    <input type="text" class="input-lg form-control" name="youname" placeholder="Youname" style="padding: 10px 22px;">
                    <input type="email" class="input-lg form-control" name="email" placeholder="E-mail" style="padding: 10px 22px;">                           
                </div>
                <div class="form-group col-lg-offset-1 col-lg-10">
                    <textarea rows="3" resize="false" class="form-control" cols="70" name="message" placeholder="{{ trans('frontend.home.mess') }}"></textarea>
                </div>
                <button class="btn btn-lg btn-success" style="padding: 20px 220px;">{{ trans('frontend.home.get_in_touch') }}</button>
            </form>
            <div class="text-center col-lg-12"> {{ trans('frontend.home.or_email') }}</div>
            <div class="text-center col-lg-12">{{ trans('frontend.home.email') }}m</div>
        </div>
    </div>
@endsection 