@extends('backend.layouts.master')

@section('title', 'Manage Package')
@section('content')
    <div class="row">
        <h2 class="text-left">List Packages
            <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Create New Package</a>
        </h2>
        <br>

        <div class="box box-success">
            <div class="col-md-12"></div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="list_users" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Time Period</th>
                            <th class="text-center">Transport</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">{!! trans('lang_admin_manager_user.edit') !!}</th>
                            <th class="text-center">{!! trans('lang_admin_manager_user.delete') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($packages))
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->address }}</td>
                                        <td>{{ $package->time_period }} days</td>
                                        <td>{{ $package->transport }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td><a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-info">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

