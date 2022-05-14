 @if($errors->any())
 @foreach($errors->all() as $error)
 <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">

     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
         <use xlink:href="#exclamation-triangle-fill" /></svg>
     <div>
         {{$error}}
     </div>
     <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endforeach
 @endif


 @if(session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{session('success') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif
 
 @if(session('error'))
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{session('error') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif
