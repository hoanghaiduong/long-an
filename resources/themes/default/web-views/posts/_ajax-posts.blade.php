
@foreach($posts as $post)
 
    <div class="{{Request::is('posts*')?'col-lg-3 col-md-4 col-sm-12 col-6':''}}">
        <a href="{{route('post_view',['id'=>$post['id']])}}" class="d-block">
            <div class="card card-container h-100">  
                   <img class="card-img-top"  onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                   src="{{\App\CPU\PostManager::post_image_path('thumbnail').'/'.$post->thumbnail}}" alt="others-post" style="height: 200px; width: 100%; display: block;">
                   <div class="card-body">
                       <h5 class="card-title two-row-truncate">{{$post->title}}</h5>
                       <p class="card-text two-row-truncate">{{$post->sub_title}}</p>
                   </div>
                   <div class="card-footer">
                       <small class="text-muted">{{ $post->created_at->format('d-m-Y H:i:s') }}</small>
   
                   </div>
           </div>   
        </a>  
    </div>
@endforeach
