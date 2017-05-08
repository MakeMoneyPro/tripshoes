@extends('backend.layouts.master')

@section('title', 'Manage Packages')
@section('content')
    <div class="row">
        <h2 class="text-left">Create New Blog</h2><br>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Blog</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.blog.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="form-group{{ $errors->has('tour_information_id') ? ' has-error' : '' }}">
                            <label for="tour_information_id">Tour</label>
                            <select name="tour_information_id" class="form-control">
                                <option value="">Choose tour</option>
                                @if(isset($tours))
                                    @foreach($tours as $tour)
                                        <option value="{{ $tour->id }}" {!! $blog->tour_information_id == $tour->id ? 'selected':'' !!}>{{ $tour->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('tour_information_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tour_information_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content" rows="2" resize="true">{{old('content', $blog->content)}}</textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/config.js') }}"></script>

@endsection

