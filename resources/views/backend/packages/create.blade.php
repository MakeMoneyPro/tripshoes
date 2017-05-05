@extends('backend.layouts.master')

@section('title', 'Manage Packages')
@section('content')
    <div class="row">
        <h2 class="text-left">Create New Package</h2><br>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Package</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter package name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">Address</label>
                            <input type="address" class="form-control" id="address" name="address" placeholder="Enter address" value="{{old('address')}}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('time_period') ? ' has-error' : '' }}">
                            <label for="time_period">Time Period</label>
                            <input type="text" class="form-control" id="time_period" name="time_period" placeholder="Enter Time Period" value="{{old('time_period')}}">
                            @if ($errors->has('time_period'))
                                <span class="help-block">
                                <strong>{{ $errors->first('time_period') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('transport') ? ' has-error' : '' }}">
                            <label for="transport">Transport</label>
                            <input type="text" class="form-control" id="transport" name="transport" placeholder="Enter Transport" value="{{old('transport')}}">
                            @if ($errors->has('transport'))
                                <span class="help-block">
                                <strong>{{ $errors->first('transport') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price')}}">
                            @if ($errors->has('price'))
                                <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about">About</label>
                            <textarea class="form-control" id="about" name="about" placeholder="About" rows="2" resize="true">{{old('about')}}</textarea>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('about_tour') ? ' has-error' : '' }}">
                            <label for="about_tour">About</label>
                            <textarea class="form-control" id="about_tour" name="about_tour" placeholder="About tour" rows="2" resize="true">{{old('about_tour')}}</textarea>
                            @if ($errors->has('about_tour'))
                                <span class="help-block">
                                <strong>{{ $errors->first('about_tour') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('about_guide') ? ' has-error' : '' }}">
                            <label for="about_guide">About</label>
                            <textarea class="form-control" id="about_guide" name="about_guide" placeholder="About guide" rows="2" resize="true">{{old('about_guide')}}</textarea>
                            @if ($errors->has('about_guide'))
                                <span class="help-block">
                                <strong>{{ $errors->first('about_guide') }}</strong>
                            </span>
                            @endif
                        </div>
                        {{--<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image"/>
                            <img src="{{url(config('path.avatar').$list->avatar)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
                        </div>--}}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create package</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

