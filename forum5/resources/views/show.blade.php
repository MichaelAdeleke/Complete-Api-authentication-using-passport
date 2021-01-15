@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<style>
#like{
    position:absolute;
    top:10px;
    right:50px;

}
</style>
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                <a href="#">{{$thread->creator->name}}</a> Posted:
                    {{$thread->title}}
                </div>
                <div class="card-body">
                      {{$thread->body}}
                 </div>
                </div>
           </div>
       </div>
</div>


<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        @foreach($thread->replies as $reply)
           <div class="level" style="margin-bottom:30px;">
                <div class="card">
                    <div class="card-header" style="height:60px;">  
                      <a href="#" class="nav-link">{{$reply->owner->name}} said
                      {{$reply->created_at->diffForHumans()}}....
                      </a>
                      <form method="POST"  action="/replies/{{$reply->id}}/favorites" >
                         {{ csrf_field() }}
                          <div class="form-group">
                              <a href="#"class="nav-link" id="like"><button type="submit" class="btn btn-default">Like</a></button>
                         </div>
                     </form>
                    </div>
                    <div class="card-body">{{$reply->body}}</div>
               </div>
            </div>
        @endforeach 
    </div>
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