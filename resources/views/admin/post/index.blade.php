@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>状态</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-xs">编辑</a>
                    <a class="btn btn-danger btn-xs">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection