@extends('Website.master')

@section('content')

@foreach($products as $data)

<div class="box_main">
    
<h4 class="shirt_text">{{$data->name}}</h4>
<p class="price_text">Price  <span style="color: #262626;">{{$data->price}}</span></p>
                                 <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>                                         



@endforeach



@endsection