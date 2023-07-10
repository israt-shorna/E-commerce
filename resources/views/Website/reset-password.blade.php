@extends('Website.master')

@section('content')

<div style="background-color: white; margin:20px; padding:20px;">
  <h1>Reset password form</h1>  
<form action="" method="post">

@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">NEW PASSWORD</label>
    <input class="form-control" type="password" required name="new_password" placeholder="enter new password">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Confirm New password</label>
    <input class="form-control" type="password" required name="password_confirmation" placeholder="enter confirm password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection