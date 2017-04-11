@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-8 col-md-offset-2">
        @foreach ($tags as $tag)
            @if (count($tag->posts) > 0)
                <a href="/tags/{{ $tag->name }}" class="btn btn-info btn-sm btn-tags" style="margin-bottom: 10px; margin-right: 5px;">
                    {{ $tag->name }} <span class="badge">
                    {{ count($tag->posts) }}</span>
                </a>
            @endif
        @endforeach
        <h5>当前共计 {{ count($tags) }} 个分类</h5>

        @if (isset($searchTag))
            <hr>
            <ul>
                @foreach ($searchTag->posts as $post)
                    <li>
                        <em>{{ date('Y-m-d', strtotime($post->created_at)) }}</em>
                        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
