@extends('layout.master')

@section('content')

<body class="order-place-bg">
  
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <img src="{{asset('assets/img/ic-order-placed-grn-tik.png')}}" class="mt-5 pt-5">
        <h1 class="mt-3 mb-5 pb-4"> Your order has been placed! </h1>
      </div>
    </div>
  </div> 
  <div class="container">
    <div class="row">
       <div class="col-sm-12 delivery-time">
        <p class="pt-1"> Your order number<strong> #{{$cookie}}</strong> will be delivered to you in <span>45 minutes</span>. In case of contact Call Us at <a href="tel:+919667555094">+919667555094</a></p>
      </div>
      <div class="col-sm-12 order-status" id="recieved">
        <p> Order Received   <i class="fas fa-check-circle float-right fa-2x"></i> </p>
      </div>
      <div class="col-sm-12 order-status" id="preparing">
        <p> Preparing Order <i class="fas fa-concierge-bell float-right fa-2x"></i></p>
      </div>
      <div class="col-sm-12 order-status" id="outfor">
        <p> Out For Delivery  <i class="fas fa-biking float-right fa-2x"></i> </p>
      </div>
      <div class="col-sm-12 order-status" id="delivered">
        <p> Delivered  <i class="far fa-smile float-right fa-2x"></i> </p>
      </div>
    </div>
  </div>  
 
@endsection

@section('footer')

<script type="text/javascript" src="{{asset('assets/js/lottie.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/data.js')}}"></script>
<script src="https://kit.fontawesome.com/2659e6167d.js" crossorigin="anonymous"></script>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) { 
  //do work

   
 function load(){
 setTimeout(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "check_status",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                      // console.log(data);
                        if(data.status == 'accept')
                        {
                          $('#recieved').addClass('active');
                        }

                        if(data.status == 'preparing')
                        {
                          $('#recieved').removeClass('active');
                          $('#recieved').addClass('clicked');
                          $('#preparing').addClass('active');
                        }
                        if(data.status == 'outfor')
                        {
                          $('#preparing').removeClass('active');
                          $('#preparing').addClass('clicked');
                          $('#outfor').addClass('active');
                        }
                        if(data.status == 'delivered')
                        {
                          $('#outfor').removeClass('active');
                          $('#outfor').addClass('clicked');
                          $('#delivered').addClass('active');
                        }
                    }
                }).always(function(){
                  load();
                });
 },15000);
}

load();
});

</script>

@endsection