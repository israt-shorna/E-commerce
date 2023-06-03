@extends('Website.master')

@section('content')

<div>
    <ul>

    
        <!-- Button trigger registration modal -->
<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationmodal">Vendor Registration</a>


<a  type="button" class="btn btn-success" data-toggle="modal" data-target="#loginmodal">
  Vendor Login </a>
</ul>
</div>







<!--Registration Modal -->
<div class="modal fade" id="registrationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('vendor.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <div class=form-group>
        <label for="">Enter Your Name </label>
        <input required name="name" type="text" class=form-control placeholder="Your Name">
        </div>

        <div class=form-group>
        <label for="">Contact </label>
        <input required name="contact" type="integer" class=form-control placeholder="Your mobile number">
        </div>


        <div class=form-group>
        <label for="">Address</label>
        <input required name="address" type="text" class=form-control placeholder="Your Address">
        </div>

        <div class=form-group>
        <label for="">Email </label>
        <input required name="email" type="email" class=form-control placeholder="Your Email">
        </div>

        <div class=form-group>
        <label for="">Bank info </label>
        <input required name="bank" type="text" class=form-control placeholder="Your Account number">
        </div>

        <div class=form-group>
        <label for="">City </label>
        <input required name="city" type="text" class=form-control placeholder="Your City">
        </div>

        <div class=form-group>
                   <label for="">Logo</label>
                   <input type="file" name="image" class="form-control"></input>
               </div>

               <div class=form-group>
        <label for="">Password </label>
        <input required name="password" type="password" class=form-control placeholder="Enter password">
        </div>
        <div class=form-group>
        <label for="">Confirm password </label>
        <input required name="password_confirmation" type="password" class=form-control placeholder="Enter password again">
        </div>

      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!--Login Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('vendor.login')}} " method="post">
         @csrf
      <div class="modal-body">
      <div class=form-group>
         <label for="">Enter Your Email</label>
         <input required name='email' type="email" class=form-control placeholder="Email">
        </div>
        <div class=form-group>
         <label for="">Enter Your Password</label>
         <input required name='password' type="password" class=form-control placeholder="password">
        </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
      </div>
      </form>
    </div>
  </div>
</div>



@endsection