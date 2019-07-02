@extends('layouts.main-app')

@section('content')


<div class="row mt-5">
   <div class="col-md-8">
      <div class="card">
         <div class="card-body">
            <h3 class="card-title text-info">{{$post->title}}</h3>
            <h6 class="text-secondary">{{$post->user->name}}</h6>
             <p><span class="text-muted">{{$post->created_at}}</span></p>
            <img src="{{URL::to('images/'.$post->file)}}" alt="" class=" rounded mb-2 card-img img-fluid">
            <div class="card-text">{{$post->body}}</div>
        </div>
      </div>
      <div class="card">
         <div class="card-body">
               <h3 class="card-title">Commentaires <span class="badge badge-dark">{{count($post->comments)}}</span></h3>
               <hr>
                  @foreach($post->comments as $comment)
                     <div class="media border p-3">
                        <div class="media-body">
                              <h6>{{App\User::findOrFail($comment->user_id)->name}}<small><i> {{$comment->created_at}}</i></small></h6>
                              <p>{{$comment->body}}</p>
                        </div>
                     </div>
                  @endforeach
                  @auth
                     <form method="post" action="{{route('comment.store')}}" >
                  @csrf
                       <div class="form-group">
                         <input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
                         <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                     </div>
                     <div class="form-group">
                     <label for="body">Message*</label>
                     <textarea class="form-control" name="message" placeholder="Message" rows="10" cols="30"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Valider</button>
               </form>
            @else
               <a href="{{route('user.login')}}" class="btn btn-link">Connectez vous pour commenter </a>
            @endauth
            @if(Auth::check() && Auth::user()->is_admin)
                 <div class="mx-auto mt-4 mb-3">
                    <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-warning btn-sm">Modifier </a>
                    <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-danger btn-sm">Supprimer </a>
                 </div>
            @endif              
         </div>
      </div>
   </div>
   <div class="col-md-4">
   @include('layouts.sidebar')
   </div>
</div>


@endsection