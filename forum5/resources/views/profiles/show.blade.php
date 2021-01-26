@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<style>

</style>
<div class="card">
   <div class="card-header">
      <h1 class="flex">
          {{$profileUser->name}}
          <small>last seen {{$profileUser->created_at->diffForHumans()}}</small>
      </h1>
   </div>
</div> 
@foreach($thread as $threads)
 <div class="card">
      <div class="row justify-content-center">
         <div class="col-md-8 col-md-offset-2">
            <div class="card"style="margin-bottom:30px">
               <div class="card-header" style="margin-bottom:30px;">
                     <a href="#">{{$threads->creator->name}}</a> Posted:
                      {{$threads->title}}
                     <span class="flex">{{$threads->created_at->diffForHumans()}}</span>
                </div>
                <div class="card-body">
                     {{$threads->body}}
               </div>
            </div>
         </div>
     </div>
   </div>
@endforeach
<span> {{$thread->links()}}</span>
</div>
@endsection