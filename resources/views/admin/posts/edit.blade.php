@extends('layouts.app')
@section('content')
    <div class="container">

        <x-alert/>
      
        <div class="card">
            <div class="card-header">
                Create post
            </div>

            <div class="card-body">
                <form method="post"  action="{{ route('admin.posts.update',$post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="required form-label" for="title">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text"
                               name="title" id="title" value="{{ old('title') ?? $post->title }}" required >

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
                    
                    <div class="mb-3">
                        <label class="required form-label" for="image">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                               name="image" id="image" value="{{ old('image') ?? $post->image }}">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="required form-label" for="tags">Tags</label>
                        <input class="form-control @error('tags') is-invalid @enderror" type="text"
                               name="tags" id="tags" value="{{ old('tags') ?? $tags}}" required>

                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <span class="help-block text-muted "> <small>Separated by comma and space like: tag, tag, tag</small> </span>
                    </div>
                    
                    <div class="mb-3">
                        <label class="required form-label" for="category">Category</label>
                        
                        <select class="form-control @error('category') is-invalid @enderror" name="category"
                                id="category" required>
                            <option value="0" disabled>--- SELECT CATEGORY ---</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == $post->category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach 
                        </select>

                        @error('category')
                            <div class="invalid-feedback">
                               {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Post</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body"
                                  id="body">{{ old('body') ?? $post->body }}</textarea>

                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <button class="btn btn-danger" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
