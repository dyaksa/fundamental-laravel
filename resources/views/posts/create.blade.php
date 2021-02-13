@extends("layouts.app", ["title" => "Create Post"])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="/post/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titleInput" class="form-label">Title</label>
                    <input type="text" class='form-control @error("title") is-invalid @enderror' id="titleInput" name="title" placeholder="Input Title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bodyInput" class="form-label">Content</label>
                    <textarea class="form-control  @error('body') is-invalid @enderror " id="bodyInput" name="body"></textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
