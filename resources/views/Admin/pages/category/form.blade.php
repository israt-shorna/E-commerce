@extends('master')

@section('content')


<form action="{{route('category.store')}}" method='post' enctype="multipart/form-data" >
@csrf
    
     <div>
            <label for="">Category Name:</label>
               <input name="category_name" placeholder="Enter category name" type="text" class="form-control">
    </div>

    <div>
                   <label for="">Image</label>
                   <input type=file name="image" class="form-control"></input>
               </div>

               <div>
                   <label for="">Select Status</label>
                   <select name="status" id="" class="form-control">
                       <option value="active">Active</option>
                       <option value="inactive">InActive</option>
                   </select>
               </div>

           

               <div>
                   <label for="">Contact</label>
                   <textarea name="contact" placeholder="mobile_number" class="form-control"></textarea>
               </div>
               <div>
                   <label for="">Description</label>
                   <textarea name="description" placeholder="description" class="form-control"></textarea>
               </div>
               <div>

<label for="">Select Parent Category</label>
<select name="parent_id" id="" class="form-control">
    <option value="">select parent</option>
 @foreach($categories as $data)
    <option value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
    
</select>
</div>

               <div>
                <button type="submit" class="btn btn-success my-2">Create</button>
               </div>

           

</form>





@endsection