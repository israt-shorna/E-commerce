@extends('Website.master')

@section('content')

<div style="background-color: white; margin:20px; padding:20px;">
    
<form action="{{route('forget.password.send.link')}}" method="post">

@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection