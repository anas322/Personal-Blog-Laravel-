@extends('layouts.app')

@section('content')
<div class="container w-75">
    <div class="row g-3">

        @if($posts->count())
            @foreach($posts as $post)

                <div class="col-xs-12 col-lg-6 col-xl-4 ">
                    <div class="bg-light post rounded">
                        <div class="article-img mb-3">
                            <a href="{{ route('posts.show',$post) }}">
                                <img src=" {{ asset('images/image.jpg') }}  "   alt="" width="100%" height="350px" style="object-fit:cover">
                            </a>
                        </div>

                        <article class="post-header p-2">
                            <h1 class="mb-0"> <a href="{{ route('posts.show',$post) }}" class="text-decoration-none">{{ $post->title }}</a> </h1>
        
                            <span class="text-muted"> {{$post->created_at->toDayDateTimeString() }}</span>
        
                            <p class="mt-4"> 
                                @if(strlen($post->body) > 500 )
                                {{substr($post->body,0,500)}}... <a href="{{ route('posts.show',$post) }}" class="text-decoration-none">read more</a>  
                                @else 
                                {{ $post->body }}
                                @endif
                            </p>
                        </article>
                        
                    </div>
                </div>

            @endforeach 
            {{ $posts->links() }}
        @endif 

   
    </div>
</div>
@endsection
