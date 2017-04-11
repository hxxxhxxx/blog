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

            <form action="{{ url('admin/posts') }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-md-1 control-label">标题</label>
                    <div class="col-md-10">
                        <input type="text" id="title" name="title" class="form-control" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="slug" class="col-md-1 control-label">SLUG</label>
                    <div class="col-md-10">
                        <input type="text" id="slug" name="slug" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags" class="col-md-1 control-label">标签</label>
                    <div class="col-md-10">
                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content" class="col-md-1 control-label">内容</label>
                    <div class="col-md-10">
                        <textarea name="content" id="content" class="form-control" rows="20" placeholder="请输入..."></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="checkbox">
                            <label for="is_draft">
                                <input type="checkbox" id="is_draft" name="is_draft"> 是否为草稿
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#tags').selectize({
            create: true
        });
    </script>
@endsection