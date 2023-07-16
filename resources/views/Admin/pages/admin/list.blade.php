@extends('master')

@section('content')

<a href="{{route('admin.form')}}" class="btn btn-success my-2"> add new</a>
<h1>{{$mg}}</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($admins as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->full_name}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->mobile_number}}</td>
      <td>
       <a href="{{route('admin.view',$data->id)}}" class="btn btn-info">View</a>
       <a href="{{route('admin.delete',$data->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>

{{$admins->links()}}


@endsection