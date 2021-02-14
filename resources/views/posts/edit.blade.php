@extends("layouts.app", ["title" => "Create Post"])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <form action="/post/{{ $post->slug }}/edit" method="POST">
                        @csrf
                        @method('patch')
                        @include('posts.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
