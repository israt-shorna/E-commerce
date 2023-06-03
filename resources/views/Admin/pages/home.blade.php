@extends('master')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                       
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Product</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                   <p  style="margin: 0 auto;font-size: xx-large">
                                   {{$product}}

                                    
                                   </p>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Category</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p  style="margin: 0 auto;font-size: xx-large">

                                    
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Brand</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p  style="margin: 0 auto;font-size: xx-large">

                                    
                                    </p>
                                    </div>
                                </div>
                            </div>
       
                        </div>



@endsection