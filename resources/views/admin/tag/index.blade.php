@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover text-center">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">状态</th>
                <th class="text-center">更新时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        @if ($tag->status)
                            <span class="glyphicon glyphicon-ok" style="color: #18BC9C"></span>
                        @else
                            <span class="glyphicon glyphicon-remove" style="color: #E74C3C;"></span>
                        @endif
                    </td>
                    <td>{{ $tag->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ url("admin/tags/$tag->id/edit") }}">编辑</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $tags->links() }}
    </div>
</div>
@endsection