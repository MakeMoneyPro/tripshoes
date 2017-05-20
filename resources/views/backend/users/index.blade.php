@extends('backend.layouts.master')

@section('title', trans('lang_admin_manager_user.title_manage_user'))
@section('content')
<div class="row">

	<h2 class="text-left">{{trans('lang_admin_manager_user.user_list')}}
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Create New User</a>
    </h2><br>
    <div class="box box-success">
    <div class="col-md-12"></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_users" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{!! trans('lang_admin_manager_user.no') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.user_name') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.fullname') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.address') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.phone') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.birthday') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.edit') !!}</th>
                        <th class="text-center">{!! trans('lang_admin_manager_user.delete') !!}</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($users as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="#">{{$item->first_name}}</a></td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($item->mobile_phone)), 2)}}</td>
                            <td>{{$item->country}}</td>
                            <td>
                                <a href="{{ route('admin.user.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('lang_admin_manager_user.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.user.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                {!! Form::button(trans('lang_admin_manager_user.delete'), ['class' => 'btn btn-danger',
                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                'data-title' => trans('lang_admin_manager_user.title_delete'),
                                'data-message' => trans('lang_admin_manager_user.confirm')]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    </div>                      
</div>
@endsection

