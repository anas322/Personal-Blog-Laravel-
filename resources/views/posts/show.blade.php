@extends('layouts.app')

@section('content')
<div class="container w-75">
    <div class="row g-3">

        <div class="col-6 ">
            <article >
              
                <div class="article-body p-2">
                    <h1 class="mb-0">
                       {{$post->title}}
                    </h1>

                    <span class="text-muted">created by {{ $post->user->name }} at {{ $post->created_at->toDayDateTimeString() }}</span>

                    <p class="mt-3 fs-3 ">{{ $post->body }}</p>
                </div>
                
            </article>
        </div>

        <div class="col-6">

            <div class="article-img mb-3">
                <a href="#">
                    <img src=" {{ asset('images/image.jpg') }}  " alt="" width="100%" height="500px" style="object-fit:cover">
                </a>
            </div>

        </div>
   
    </div>
</div>
@endsection
