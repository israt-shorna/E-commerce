@extends('master')

@section('content')

<form action="{{route('products.store')}}"  method='post' enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" type="string" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Category">Category</label>
   
    <select name="category_id" class="form control">
    @foreach($categories as $data)
      <option value="{{$data->id}}">{{$data->name}}</option>
  @endforeach  
  </select>
  </div>

  <div class="form-group">
    <label for="">Image</label>
    <input name="image" type="file" class="form-control" placeholder="Upload image">
  </div>
  
  
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input  name='description' type="text" class="form-control" id="exampleInputPassword1" placeholder="description">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input  name='price' type="text" class="form-control" id="exampleInputPassword1" placeholder="price">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





@endsection