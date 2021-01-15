@entends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-header">  
        <a href="#" class="nav-link">{{$reply->owner->name}} said
            {{$reply->created_at->diffForHumans()}}....
        </a>
        <form action="/replies/{{$reply->id}}/favorites" method="POST">
                         {{csrf_field()}}
                          <div class="form-group">
                              <a href="#"class="nav-link" id="like"><button type="submit" class="btn btn-default">Like</a></button>
                         </div>
                     </form>
    </div>
    <div class="card-body">{{$reply->body}}</div>
</div>
@endsection