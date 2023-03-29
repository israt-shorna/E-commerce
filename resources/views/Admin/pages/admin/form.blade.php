@extends('master')

@section('content')


<form action="{{route('admin.store')}}" method='post'>
     @csrf
     <div>
            <label for="">Admin Name:</label>
               <input require name="admin_name" placeholder="Enter admin name" type="text" class="form-control">
    </div>

               <div>
                   <label for="">Select Status</label>
                   <select require name="status" id="" class="form-control">
                       <option value="active">Active</option>
                       <option value="inactive">InActive</option>
                   </select>
               </div>

           

               <div>
                   <label for="">Contact</label>
                   <textarea require name="contact" placeholder="mobile_number" class="form-control"></textarea>
               </div>
               <div>
                <button type="submit" class="btn btn-success my-2">Create</button>
               </div>
</form>





@endsection
