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
    </tr>
  </thead>
  <tbody>

  @foreach($cat as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->status}}</td>
      <td>{{$data->description}}</td>
      <td>
        <a href="" class='btn btn-info'>View</a>
        <a href=""class='btn btn-danger'>Delete</a>
      </td>
      
    </tr>



    @endforeach

    
  </tbody>
</table>

{{$cat->links()}}










@endsection