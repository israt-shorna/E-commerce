@extends('master')
@section('content')

<label for=""> Name:</label>
    <input type="text" value="{{$cat->name}}" readonly class="form-control">
<label for="">Status</label>
    <input type="text" value="{{$cat->status}}" readonly class="form-control">
<label for="">Description</label>
    <input type="text" value="{{$cat->description}}" readonly class="form-control">

    <a href="{{route('category.list')}}" class="btn btn-success my-2">Back</a>
@endsection