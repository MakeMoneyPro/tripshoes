@extends('backend.layouts.master')

@section('title', Manager Tour)
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;Edit Tour</h2><br>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit tour</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('admin.blog.update',$list ->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name Tour:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$list->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">{{trans('lang_admin_manager_user.price_address')}}</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{$list->price}}">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">{{trans('lang_admin_manager_user.address')}}</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$list->address}}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
                        <label for="mobile_phone">{{trans('lang_admin_manager_user.phone')}}</label>
                        <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Phone" value="{{$list->mobile_phone}}">
                        @if ($errors->has('mobile_phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile_phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="image">{{trans('lang_admin_manager_user.avatar')}}</label>
                        <input type="file" id="image" name="avatar"/>
                        <img src="{{url(config('path.avatar').$list->avatar)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{trans('lang_admin_manager_user.update_user')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

