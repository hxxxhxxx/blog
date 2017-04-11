@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-8 col-md-offset-2 archives">
        <ul>
            <li>当前共 {{ $count }} 篇文章</li>
            @foreach ($posts as $post)
                <li>
                    <span>{{ date('Y-m-d', strtotime($post->created_at)) }}</span>
                    <a href="blog/{{ $post->slug }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection