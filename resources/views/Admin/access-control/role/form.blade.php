@extends('master')

@section('content')


<form action="{{route('role.store')}}" method='post'>
@csrf
    
     <div>
            <label for="">Role Name:</label>
               <input name="name" placeholder="Enter role name" type="text" class="form-control">
    </div>

  

               <div>
                   <label for="">Select Status</label>
                   <select name="status" id="" class="form-control">
                       <option value="active">Active</option>
                       <option value="inactive">InActive</option>
                   </select>
               </div>

           

            



               <div>
                <button type="submit" class="btn btn-success my-2">Create</button>
               </div>

           

</form>





@endsection