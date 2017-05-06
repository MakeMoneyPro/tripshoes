@extends('backend.layouts.master')

@section('title', " Tour Manager"))
@section('content')
<div class="row">
	<h2 class="text-left">List Tour</h2><br>
    <div class="box box-success">
    <div class="col-md-12"></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="list_users" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">About</th>
                        <!-- <th class="text-center">Image</th> -->
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
	                <tbody>
	                    <?php $index=1; ?>
                        @foreach($tourlist as $item)
                        <tr>
                            <td>{!! $index++ !!}</td>
                            <td><a href="#">{{$item->name}}</a></td>
                            <td>{{$item->about}}</td>
                            <!-- <td><img src="{{ url('frontend/images/'.$item->image) }}" class="img-responsive sizefood" ></td> -->
                            <td>
                                <a href="{{ route('admin.tour.edit',$item ->id)}}"><button class="btn btn-info">{!!trans('lang_admin_manager_user.edit' )!!}</button></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.tour.destroy', $item->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
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

