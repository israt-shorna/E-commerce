@extends('master')

@section('content')

<form action="{{route('products.store')}}"  method='post'>
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" type="string" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input  name='description' type="text" class="form-control" id="exampleInputPassword1" placeholder="description">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection