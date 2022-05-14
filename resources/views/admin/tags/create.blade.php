@extends('layouts.app')
@section('content')
<div class="container">

    <x-alert />
    
    <div class="card">
        <div class="card-header">
            Create Tag
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.tags.store') }}"
                >
                @csrf
                <div class="form-group ">
                    <label class="required mb-2" for="tag">Name</label>
                    <input class="form-control @error('tag')  'is-invalid'  @enderror" type="text" name="tag"
                        id="tag" >

                    @error('tag')
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
