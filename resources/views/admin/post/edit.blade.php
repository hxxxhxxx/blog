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

            <form action="/admin/posts/{{ $post->id }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="title" class="col-md-1 control-label">标题</label>
                    <div class="col-md-10">
                        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="slug" class="col-md-1 control-label">SLUG</label>
                    <div class="col-md-10">
                        <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags" class="col-md-1 control-label">标签</label>
                    <div class="col-md-10">
                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach ($post->tags as $tag)
                                <option value="{{ $tag->name }}" selected>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content" class="col-md-1 control-label">内容</label>
                    <div class="col-md-10">
                        <textarea name="content" id="content" class="form-control" rows="20" placeholder="请输入...">
                            {{ $post->content }}
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="checkbox">
                            <label for="is_draft">
                                <input @if (! $post->status) checked @endif type="checkbox" id="is_draft" name="is_draft"> 是否为草稿
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">添加</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                            删除
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--标签删除 弹出框--}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>请确认</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">确定要删除吗</p>
                </div>
                <div class="modal-footer">
                    <form action="/admin/posts/{{ $post->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">确定</button>
                    </form>
                </div>
            </div>
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