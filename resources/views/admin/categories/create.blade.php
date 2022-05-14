@extends('layouts.app')
@section('content')
<div class="container">

    <x-alert />
    
    <div class="card">
        <div class="card-header">
            Create category
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}"
                >
                @csrf
                <div class="form-group ">
                    <label class="required mb-2" for="category">Name</label>
                    <input class="form-control @error('category')  'is-invalid'  @enderror" type="text" name="category"
                        id="name" >

                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
