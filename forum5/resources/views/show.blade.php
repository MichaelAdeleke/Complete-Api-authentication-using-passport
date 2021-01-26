@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
<style>
#formlike{
  position:absolute;
  top:-20px;
}
.level{
  display:flex;
}
</style>
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8 " id="postexpand">
            <div class="card">
              <div class="level" style="margin-bottom:30px;">
                  <div class="card-header">
                   <a href="/profiles/{{$thread->creator->name}}">{{$thread->creator->name}}</a> Posted:
                       {{$thread->title}}
                      <span class="flex">
                         <form method="POST" action="{{$thread->path()}}">
                         {{ csrf_field() }}
                         {{method_field('DELETE')}}
                           <button type="submit" class="btn btn-link" id="delete">Delete Thread</button>
                         </form>
                      </span>
                    </div>
                </div>
                <div class="card-body">
                
                      {{$thread->body}}
                 </div>
                </div>
           </div>
       </div>
</div>


<div class="row justify-content-center">
  <div class="col-md-8 ">
    <div class="level" style="margin-bottom:30px;">
    <div id="app">
    
       
        @foreach($thread->replies as $reply)
          
            <div class="card">
             <div class="card-header level" style="height:120px;">  
             <a href="/profiles/{{$reply->owner->name}}" class="nav-link">{{$reply->owner->name}} said
              {{$reply->created_at->diffForHumans()}}....
              </a>
              <form method="POST"  action="/replies/{{$reply->id}}/favorites" id="formlike" >
              {{ csrf_field() }}
              <div class="form-group">
               <subscribe :active="{{json_encode($thread->isSubscribedTo)}}"></subscribe>
                <button type="submit" class="btn btn-link" id="like">Like</button>
                <a href="#" class="nav-link"> 
                  {{$reply->favorites()->count()}} 
                  {{Str::plural('Like', $reply->favorites()->count())}}
                </a>
              </div>
             </form>
          </div>
              
              <div class="card-body">
               <div class="body">{{$reply->body}}</div>
              </div>
          <div class="card-footer">
            
              <form method="POST" action="/replies/{{$reply->id}}">
                 {{ csrf_field() }}
                 {{ method_field( 'DELETE') }}
                <button type="submit" class="btn btn-link">Delete</button>
              </form>
              <reply>
            </div>
          </div>
        @endforeach
      
        </div>
    </div>
  </div>
</div>
</reply>
</div>




@if(auth()->check())
<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
       <form method="POST" action="{{$thread->path().'/replies'}}">
          {{ csrf_field() }}
            <div class="form-group">
             <textarea class="form-control"name="body" id="body" placeholder="whats on your mind" rows="5"></textarea>
          </div>
          <br />
          <button type="sumit" class="btn btn-success">Post</button>
      </form>
    </div>
    @endif  
</div> 


@endsection