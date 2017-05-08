@extends('backend.layouts.master')

@section('title', 'Manage Blog')
@section('content')
    <div class="row">
        <h2 class="text-left">List Blogs
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create New Blog</a>
        </h2>
        <br>

        <div class="box box-success">
            <div class="col-md-12"></div>
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="table-responsive">
                    <table id="list_users" class="table table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tour</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($blogs))
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->tours->name }}</td>
                                    <td><a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-info">Edit</a></td>
                                    <td>{!! Form::open(['route' => ['admin.blog.destroy', $blog->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                        {!! Form::button('Delete', ['class' => 'btn btn-danger',
                                        'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                        'data-title' => 'Delete Blog',
                                        'data-message' => 'Delete']) !!}
                                        {!! Form::close() !!}</td>
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

