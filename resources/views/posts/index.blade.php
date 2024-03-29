@extends('layouts.app', ["title" => "Post Page"])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        @if(isset($category))
        <h1>Category : {{ $category }}</h1>
        @endif
        @if(isset($tag))
        <h1>Tag : {{ $tag->title }}</h1>
        @endif
        @if(!isset($category) && !isset($tag))
        <h1>All Post</h1>
        @endif
        <div>
            @if(Auth::check())
            <a href="/post/create" class="btn btn-primary btn-md">Create Post</a>
            @else
            <a href="/login" class="btn btn-primary btn-md">Please Login</a>
            @endif
        </div>
    </div>
    <div class="row">
        @if($posts->count())
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->body, 100, '.') }}</p>
                    <a class="card-link" href='/post/{{ $post->slug }}'>Read more</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    Publish on {{ $post->created_at->diffForHumans() }}
                    @auth
                    <a href="/post/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
        @else
        <div class="alert alert-info">
            Nothing Post Article
        </div>
        @endif
    </div>
</div>
@endsection
