@extends('layouts.app')

@section('content')

<div class="container">

    <x-alert />

    <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-success" href="{{ route('admin.posts.create') }}">
                Add post
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> Posts list</div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td class="d-flex justify-content-center gap-4">
                                <a class="btn btn-xs btn-info" href=" {{ route('admin.posts.edit',$post) }} ">
                                    Edit
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('posts.show',$post) }}">
                                    preview
                                </a>

                                <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>



        </div>
    </div>
</div>

@endsection
