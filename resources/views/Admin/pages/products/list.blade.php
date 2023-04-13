@extends('master')

@section('content')

<a href="{{route('products.form')}}" class="btn btn-success" >Add New</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>

  @foreach($products as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td><img src="{{url('/uploads/'.$data->image)}}" alt="image"></td>
      <td>{{$data->category->name}}</td>

      <td>{{$data->description}}</td>
      <td>{{$data->price}}</td>
    </tr>
    @endforeach
   
  </tbody>
</table>

{{$categories->links()}}

@endsection