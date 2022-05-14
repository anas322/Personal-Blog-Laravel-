@extends('layouts.app')

@section('content')

<div class="container">

    <x-alert />

     <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-success" href="{{ route('admin.tags.create') }}">
                Add Tag
            </a>
        </div>
    </div>

    <div class="row">

        @foreach($tags as $tag)
        <div class="col-sm-6 col-md-3">

            <div class="card text-dark bg-light mb-3 mx-auto" style="max-width: 18rem;">

                <div class="card-header">Category Name</div>

                <div class="card-body">

                    <h5 class="card-title">{{$tag->name}}</h5>
                    <span class="text-muted"> {{$tag->posts->count()}} posts </span>
                    <div class="d-flex mt-4 gap-2 justify-content-end">
                       
                        <a href="{{ route('admin.tags.edit',$tag) }}" class="btn btn-primary">Update</a>

                        <form action="{{ route('admin.tags.destroy',$tag) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Delete">
                        </form>
                    </div>

                </div>
            </div>

        </div>
        @endforeach

    </div>

    <div>
        {{ $tags->links() }}
    </div>

</div>

@endsection
