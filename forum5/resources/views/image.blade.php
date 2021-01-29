<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
<form method="POST" action="{{action('ImageController@store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="file" class=" form-control-sm" placeholder="kindly upload image" name="avatar" />
<button type="submit" class="btn btn-primary">upload</button>
<script src="{{asset ('js/app.js')}}"></script>
</form>
<img src="{{asset(Auth::user()->avatar)}}" style="height:60px; width:60px; border-radius:50%"/> 