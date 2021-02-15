<div class="mb-3">
    <label for="titleInput" class="form-label">Title</label>
    <input value="{{ old('title') ?? $post->title }}" type="text" class='form-control @error("title") is-invalid @enderror' id="titleInput" name="title" placeholder="Input Title">
    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="bodyInput" class="form-label">Content</label>
    <textarea class="form-control  @error('body') is-invalid @enderror " id="bodyInput" name="body">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="categoryInput" class="form-label">Category</label>
    <select name="category" class="form-control @error('category') is-invalid  @enderror">
        <option selected disabled>Choose One</option>
        @foreach($categories as $category)
        <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="tagsInput" class="form-label">Tags</label>
    <select class="form-control select2 @error('tags') is-invalid  @enderror" name="tags[]" multiple>
        @foreach($post->tags as $tag)
        <option selected value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
    </select>
    @error('tags')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<button class="btn btn-primary btn-lg">{{ $submit ?? 'Update' }}</button>
