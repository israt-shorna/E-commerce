@extends('master')

@section('content')


<form action="{{route('category.update', $categories->id)}}" method='post' enctype="multipart/form-data">
@method('put')

@csrf
    
     <div>
            <label for="">Category Name:</label>
            
               <input name="category_name" value="{{$categories->name}}"  type="text" class="form-control">
    </div>

    <div>
                   <label for="">Image</label>
                   <input type=file name="image" value="{{$categories->image}}"class="form-control"></input>
               </div>

               <div>
                   <label for="">Select Status</label>
                   <select name="status" value="{{$categories->status}}" class="form-control">
                       <option value="active">Active</option>
                       <option value="inactive">InActive</option>
                   </select>
               </div>

           

               <div>
                   <label for="">Contact</label>
                   <textarea name="contact" value="{{$categories->contact}}"  class="form-control"></textarea>
               </div>
               <div>
                   <label for="">Description</label>
                   <textarea name="description" value="{{$categories->description}}"  class="form-control"></textarea>
               </div>
               <div>

<label for="">Select Parent Category</label>
<select name="parent_id"  id="" class="form-control">
    <option value="">select parent</option>
 @foreach($parent as $data)
    <option value="{{$data->parent_id}}">{{$data->name}}</option>
    @endforeach
    
</select>
</div>
               <div>
                <button type="submit" class="btn btn-success my-2">Update</button>
               </div>

           

</form>





@endsection