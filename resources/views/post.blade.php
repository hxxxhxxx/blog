@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="post-detail col-md-8 col-md-offset-2">
            <div class="post-title text-center">{{ $post->title }}</div>
            <div class="post-msg text-center">
                <span>发表于 {{ $post->created_at }} </span>
                <span>分类于 <a href="#">编程</a></span>
            </div>
            <div class="post-content">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
