@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
<div class="row">
    <h2 class="text-left">&nbsp;Add User</h2><br>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('admin.user.store',$list ->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username">{{trans('lang_admin_manager_user.username')}}</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{$list->username}}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">{{trans('lang_admin_manager_user.password')}}</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" value="{{$list->password}}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">{{trans('lang_admin_manager_user.email_address')}}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$list->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
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

