@extends('layouts.app')

@section('content')
<div class="container w-50 d-flex justify-content-center flex-column">

    <div class="form-container p-3 rounded">
        <form action="#" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title...">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Article</label>
                <textarea class="form-control" name="body" id="body" rows="3" placeholder="Type Something..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary d-block float-end">Post</button>
        </form>
    </div>



</div>
@endsection
