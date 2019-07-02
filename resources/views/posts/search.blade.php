@extends('layouts.main-app')

@section('content')


<div class="row mt-5">
   <div class="col-md-8">
   @if(count($posts) > 0)
   @foreach($posts as $post)
      <div class="card rounded-0 ">
         <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <img src="{{URL::to('images/'.$post->file)}}" alt="" class=" rounded mb-2 card-img img-fluid">
            <div class="card-text">{{str_limit($post->body,200)}}</div>
            <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-link">Voir</a>
        </div>
     </div>
     @endforeach
     @else
          <div class="alert alert-inf">Aucun article trouvé</div>
     @endif
     <div class="mx-auto mt-2">
       <ul class="pagination">
          {{$posts->links()}}
        </ul>
     </div>
</div>
   <div class="col-md-4">
    @include('layouts.sidebar')
        
   </div>
</div>


@endsection