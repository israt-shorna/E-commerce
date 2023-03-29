@extends('master')
@section('content')

<label for="">Consumer Name:</label>
    <input type="text" value="{{$admin->name}}" readonly class="form-control">
<label for="">Email:</label>
    <input type="text" value="{{$admin->email}}" readonly class="form-control">
<label for="">Mobile Number:</label>
    <input type="text" value="{{$admin->mobile_number}}" readonly class="form-control">

    <a href="{{route('admin.list')}}" class="btn btn-success my-2">Back</a>
@endsection