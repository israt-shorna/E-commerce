@extends('master')

@section('content')

<a href="{{route('category.form')}}" class='btn btn-success my-2'> add new </a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Description</th>
      <th scope="col">Parent Id</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach($categories as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->status}}</td>
      <td>{{$data->description}}</td>
      <td>{{$data->parent_id}}</td>
      <td>
      <img src="{{url('/uploads/'.$data->image)}}" width=80 alt="image">
      </td>
      <td>
        <a href="{{route('category.view', $data->id)}}" class='btn btn-info'>View</a>
        <a href="{{route('category.delete', $data->id)}}"class='btn btn-danger'>Delete</a>
        <a href="{{route('category.edit',$data->id)}}"class='btn btn-success'>Edit</a>

      </td>
      
    </tr>



    @endforeach

    
  </tbody>
</table>

{{$categories->links()}}










@endsection