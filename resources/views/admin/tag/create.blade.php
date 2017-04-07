@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-8 col-md-offset-2">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('admin/tags') }}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-md-3 control-label">标签</label>
                <div class="col-md-6">
                    <input type="text" id="name" name="name" class="form-control" autofocus>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection