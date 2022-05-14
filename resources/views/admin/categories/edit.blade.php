@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Update category
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}"
               >
                @csrf
                @method('PUT')
                <div class="form-group ">
                    <label class="required mb-2" for="category">Name</label>
                    <input class="form-control @error('category')  'is-invalid'  @enderror" type="text" name="category"
                        id="name" value="{{ old('category', $category->name) }}">
                    @error('category')
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
