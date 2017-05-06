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
                <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter package name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('guide_id') ? ' has-error' : '' }}">
                            <label for="guide_id">Guide</label>
                            <select name="guide_id" class="form-control">
                                <option value="">Choose guide</option>
                                @if(isset($users))
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('guide_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('guide_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-append date form-group{{ $errors->has('time') ? ' has-error' : '' }}" data-date="Select Date">
                            <label for="time">Select Time</label>
                            <input type="text" class="form-control" id="time" size="16" value="{{ old('time') }}" name="time">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                        @if ($errors->has('guide_id'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('guide_id') }}</strong>
                                </span>
                        @endif
                        <div class="form-group{{ $errors->has('place_id') ? ' has-error' : '' }}">
                            <label for="place_id">Place</label>
                            <select name="place_id" class="form-control">
                                <option value="">Choose Place</option>
                                @if(isset($places))
                                    @foreach($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('place_id'))
                                <span class="help-block">
                                <strong>{{ $errors->first('place_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{!! old('address')!!}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                            <label for="lat">Latitude</label>
                            <input type="number" step="any" class="form-control" id="lat" name="lat" placeholder="Enter latitude" value="{!! old('lat')!!}">
                            @if ($errors->has('lat'))
                                <span class="help-block">
                                <strong>{{ $errors->first('lat') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                            <label for="lng">Longitude</label>
                            <input type="number" step="any" class="form-control" id="lng" name="lng" placeholder="Enter longitude" value="{!! old('lng')!!}">
                            @if ($errors->has('lng'))
                                <span class="help-block">
                                <strong>{{ $errors->first('lng') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('time_period') ? ' has-error' : '' }}">
                            <label for="time_period">Time Period</label>
                            <input type="number" step="any" class="form-control" id="time_period" name="time_period" placeholder="Enter Time Period" value="{{old('time_period')}}">
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
                            <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price')}}">
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
                        <div class="form-group{{ $errors->has('image[]') ? ' has-error' : '' }}">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image[]" multiple="multiple" accept="image/gif,image/png,image/jpeg"/>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create package</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript">
        $('#time').datepicker({
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection

