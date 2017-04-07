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

            <form action="/admin/tags/{{ $tag->id }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">标签</label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name" class="form-control" value="{{ $tag->name }}"autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-md-3 control-label">状态</label>
                    <div class="col-md-2">
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if ($tag->status) selected @endif>可用</option>
                            <option value="0" @if (! $tag->status) selected @endif>禁用</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">修改</button>
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
                    <form action="/admin/tags/{{ $tag->id }}" method="POST">
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