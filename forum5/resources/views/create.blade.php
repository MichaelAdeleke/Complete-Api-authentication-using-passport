@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="card"> 
          <div class="card-header">Create a new Thread
          </div>
          <div class="card-body">
                <form method="POST" action="/threads">
                 {{ csrf_field() }}
                 <div class="form-group">
                   <label for="channel">Choose a Channel:</label>
                   <select type="text" class="form-control"name="channel_id" id="channel_id" required>
                    <option value="" >Choose One...</option>
                    @foreach($channels as $channel )
                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                   </select>
                   </div>
                   <br />
                   <div class="form-group">
                   <label for="title">Title:</label>
                   <input type="text" class="form-control" id="title" placeholder="Thread Title" name="title"required>
                   </div>
                   <br />
                   <div class="form-group">
                   <label for="body">Body:</label>
                   <textarea type="text" class="form-control" id="body" placeholder="Thread Title" rows="5" name="body" required></textarea>
                   </div>
                   <button type="submit" class="btn btn-success" >Publish</button>
                </form>
          </div>
      </div>
    </div>
</div>
@endsection