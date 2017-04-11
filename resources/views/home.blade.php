@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="post-list col-md-8 col-md-offset-2">
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a class="post-title" href="blog/{{ $post->slug }}">{{ $post->title }}</a>
                        <div class="post-msg">
                            <span>发表于 {{ $post->created_at }} </span>

                            <span>分类于
                                @foreach($post->tags as $tag)
                                    <a href="tags/{{ $tag->name }}">[ {{ $tag->name }} ]</a>
                                @endforeach
                            </span>
                        </div>
                        <div class="post-content">
                            {{ str_limit($post->content) }}
                        </div>
                        <a class="read_all" href='{{ url("blog/$post->slug") }}'>阅读全文</a>
                    </li>
                @endforeach
            </ul>
            <div class="pull-right">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
