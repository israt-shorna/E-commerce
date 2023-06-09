@extends('master')

@section('content')




<div style="padding: 20px;">
    <h1>Assigning permissions to - {{$role->name}}</h1>
    <ul class="list-group">
        <li class="list-group-item active">
            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="select_all" />
                <label class="form-check-label" for="flexCheckDefault">Select All</label>
            </div>

        </li>

        <form action="{{route('assign.permission',$role->id)}}" method="post">

            <button type="submit" class="btn btn-success">Submit</button>
            @csrf

            @php
            $assigned_permissions=$role->permissions->pluck('permission_id')->toArray();
            @endphp

        @foreach($permissions as $permission)

                <li class="list-group-item">
                    <div class="form-check">
                        <input

                            @if(in_array($permission->id,$assigned_permissions))
                                checked
                            @endif

                            name="selected_permissions[]" class="form-check-input" type="checkbox" value="{{$permission->id}}" id="permission_{{$permission->id}}" />
                        <label class="form-check-label" for="permission_{{$permission->id}}">
                            {{ ucfirst(str_replace('.',' ',$permission->name))}}

                        </label>
                    </div>
                </li>

        @endforeach



        </form>
    </ul>


</div>





@endsection
