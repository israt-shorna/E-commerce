
        <!-- header section start -->
        <section class="header_section">

            <div class="container">



            @if(session()->has('userId'))
                <p class="badge badge-danger">
                    <span> Please verify your email.</span>
                    <a class="btn btn-success" href="{{route('email.verify',session()->get('userId'))}}">Verify now</a>
                </p>
            @endif



               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category
                     </button>

                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">



                     @foreach($categories as $data)

                        <a class="dropdown-item" href="{{route('product.under.category', $data->id)}}">{{$data->name}}</a>
                        @endforeach

                     </div>


                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <form action="{{route('product.search')}}">
                     <div class="input-group">
                        <input name='search_key' value="{{request()->search_key}}" type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                     </form>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>

                           @guest

                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <!--Registration Button trigger modal -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registration">
                          Registration
                        </button></a>
                                                   </li>

                           <li>
                              <!-- Login Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">
                          Log in
                        </button>
                           </li>
                           @endguest

                           @auth

                     <li>


            <p>{{auth()->user()->name}}</p>
            <a href="{{route('user.logout')}}" class="btn btn-danger">Logout</a>

                     </li>

                     @endauth
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
</section>



<!--Registration Modal -->
<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register yourself</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.store')}} " method="post">
         @csrf
      <div class="modal-body">
         <div class=form-group>
        <label for="">Enter Your Name </label>
        <input required name="customer_name" type="text" class=form-control placeholder="Your Name">
        </div>
        <div class=form-group>
          <label for="">Enter Your Email</label>
          <input required name='customer_email' type="email" class=form-control placeholder="Your Email">
        </div>
        <div class=form-group>
         <label for="">Enter Your Password</label>
         <input required name='password' type="password" class=form-control placeholder="password">
        </div>
        <div class=form-group>
         <label for="">Confirm Your Password</label>
         <input required name='password_confirmation' type="password" class=form-control placeholder="Retype password">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user.login')}} " method="post">
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

         <a href="{{route('forget.password')}}">Forget password?</a>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
      </div>
      </form>
    </div>
  </div>
</div>
         <!-- header section end -->
