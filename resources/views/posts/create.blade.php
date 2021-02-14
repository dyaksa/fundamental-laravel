@extends("layouts.app", ["title" => "Create Post"])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="/post/create" method="POST">
                @csrf
                @include('posts.partials.form-control')
            </form>
        </div>
    </div>
</div>
@endsection
