@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        @foreach($threads as $thread)
        
            <div class="level" style="margin-bottom:30px;">
                <div class="card">
                    <div class="card-header">
                        <article>
                            <h4>
                                <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}" class="nav-link">
                                    {{$thread->title}}
                                </a>
                            </h4>  
                        </article>
                    </div>
                    <div class="card-body">
                        <div class="body">
                            {{$thread->body}}
                        </div>
                    </div>
                </div>
          </div>
        @endforeach
    </div>
</div>
@endsection