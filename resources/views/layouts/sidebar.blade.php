<div class="card rounded-0">
    <h3 class="card-title mx-2 mt-1">Dérniers Articles</h3>
    @foreach($lastAddedPosts as $post)
    <div class="media border p-3">
        <img src="{{URL::to('images/'.$post->file)}}" alt="John Doe" class="mr-3 mt-3 rounded w-25 ">
        <div class="media-body">
        <a href="{{route('posts.show',['id'=>$post->id])}}"><h6>{{$post->title}} <small><i>{{$post->created_at}}</i></small></h6></a>
        <p>{{str_limit($post->title,20)}}</p>
        </div>
    </div>
    @endforeach
</div>