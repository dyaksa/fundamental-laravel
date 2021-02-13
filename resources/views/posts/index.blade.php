@extends('layouts.app')

@section('title','Post')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @foreach($posts as $post)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->body, 100, '.') }}</p>
                    <a class="card-link" href='/post/{{ $post->slug }}'>Read more</a>
                </div>
                <div class="card-footer">
                    Publish on {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
            @endforeach
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
