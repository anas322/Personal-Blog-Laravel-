@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Update tag
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.tags.update', $tag) }}"
               >
                @csrf
                @method('PUT')
                <div class="form-group ">
                    <label class="required mb-2" for="tag">Name</label>
                    <input class="form-control @error('tag')  'is-invalid'  @enderror" type="text" name="tag"
                        id="tag" value="{{ old('tag', $tag->name) }}">

                    @error('tag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
