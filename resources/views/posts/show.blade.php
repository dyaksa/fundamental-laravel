@extends("layouts.app")

@section('title','Post Title')

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            <small><a href="/category/{{ $post->category->slug }}"> {{ $post->category->title }}</a> , Published on : {{ $post->created_at->format('D M, Y') }} </small>
        </div>
        <hr>
        <p>
            {{ $post->body }}
        </p>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapus?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $post->body  }}</p>
                        <div class="text-secondary">
                            <small>{{ $post->created_at->format('d M, y') }}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                        <form action="/post/{{ $post->slug }}/delete" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
