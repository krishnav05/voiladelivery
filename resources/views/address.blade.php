@extends('layout.master')
@section('content')
  <body class="kitchen-bg">
    

   <div class="container">
    <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a href="kitchen" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"></rect>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"></rect>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                  </g>
                </svg>
                Back
              </a>
            </div>
          <div class="col-sm-6 text-right">
               
          </div>
          
       </div>
    <div class="row">
        <div class="col-sm-12 text-center mt-3">
           <h1>Select Address, Date & Time</h1>
         </div>
    </div>
    @if(!$all_address->isEmpty())
    <h5 class="col-sm-12 mt-2">Select Address</h5>
    @foreach($all_address as $key)
    @if($loop->first)
    <div class="row">
      <div class="col"><p>
        <input class="check" type="checkbox" checked="checked" name="address_check" id="{{$key['id']}}">
        {{$key['name']}} , 
        {{$key['flat_number']}} ,
        {{$key['society']}} ,
        {{$key['pincode']}} ,
        {{$key['landmark']}}</p>
          
      </div>  
    </div>
    @else
    <div class="row">
      <div class="col"><p>
        <input class="check" type="checkbox" name="address_check" id="{{$key['id']}}">
        {{$key['name']}} , 
        {{$key['flat_number']}} ,
        {{$key['society']}} ,
        {{$key['pincode']}} ,
        {{$key['landmark']}} </p>
         
      </div>  
    </div>
    @endif
    @endforeach
    @endif
    <div class="row">
      <div class="col">
          <a href="#" class="" id="show_address_field"> + Add new address </a>
          <form id="address_form" class="address-ad-frm mt-3" style="display: none;">
             <input type="text" class="form-control" name="name" placeholder="Name">
             <input type="text" class="form-control" name="flat" placeholder="Flat/House No.">
             <input type="text" class="form-control" name="society" placeholder="Society">
             <input pattern="\d*" type="text" size="6" minlength="6" maxlength="6" class="form-control" name="pincode" placeholder="PIN Code">
             <input type="text" class="form-control" name="landmark" placeholder="Landmark">
             <input type="button" name="" value="Add Address" class="btn btn-primary col " id="add_address">
          </form>
      </div>
    </div>
    
   </div>
   
   <div class="container mt-5">
     <div class="row">
       <h2 class="col-sm-12">Delivery Date/Time</h2>
       <div class="col mt-3">
        <p style="color: #999;">Select Date</p>
         <a class="select-date active" data-value="{{  now()->toDateString() }}">{{  now()->toDateString() }}</a>
         <a class="select-date" data-value="{{  now()->addDays(1)->toDateString() }}">{{  now()->addDays(1)->toDateString() }}</a>
         <a class="select-date" data-value="{{  now()->addDays(2)->toDateString() }}">{{  now()->addDays(2)->toDateString() }}</a>
         <a class="select-date" data-value="{{  now()->addDays(3)->toDateString() }}">{{  now()->addDays(3)->toDateString() }}</a>
       </div>
       <div class="col mt-3">
        <p style="color: #999;">Select Time</p>
        @foreach($timeslots as $tslots)
        @if($loop->first)
         <a class="select-time active" id="{{$tslots['id']}}">{{$tslots['details']}}</a>
        @else
        <a class="select-time" id="{{$tslots['id']}}">{{$tslots['details']}}</a>
        @endif
        @endforeach
       </div>
     </div>
   </div>
   <div class="row fixed-bottom mt-5">
         <input id="paynow" type="button" name="" data-price="{{$total_price}}" value="PROCEED TO PAYMENT" class="btn btn-primary col rounded-0">
       </div>
  
@endsection

@section('footer')
<script src="https://checkout.razorpay.com/v1/checkout.js" defer></script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) { 
  //do work
  //show or hide address form
  $('#show_address_field').on('click',function(){
    if(!$('.address-ad-frm').is(':visible')){
        $('.address-ad-frm').slideDown();
      }
      else{
        $('.address-ad-frm').slideUp();
      }
  });

  //add address
  $('#add_address').on('click',function(){
    if($('input[name="name"]').val().trim() == '')
    {
      $('input[name="name"]').attr("placeholder", "Please fill this field");
    }
    if($('input[name="flat"]').val().trim() == '')
    {
      $('input[name="flat"]').attr("placeholder", "Please fill this field");
    }
    if($('input[name="society"]').val().trim() == '')
    {
      $('input[name="society"]').attr("placeholder", "Please fill this field");
    }
    if($('input[name="pincode"]').val().trim() == '')
    {
      $('input[name="pincode"]').attr("placeholder", "Please fill this field");
    }
    if($('input[name="landmark"]').val().trim() == '')
    {
      $('input[name="landmark"]').attr("placeholder", "Please fill this field");
    }

    $('input[name="name"]').css("border-color", "lime");
    // const arr = $('#address_form').serializeArray(); // get the array
    // const data = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
    function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var arr = $('#address_form').serializeArray();
var data = arr.reduce(function (acc, _ref) {
  var name = _ref.name,
      value = _ref.value;
  return _objectSpread(_objectSpread({}, acc), {}, _defineProperty({}, name, value));
}, {});
    // console.log(data);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "add_address",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, data: data},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        {
                          $('#address_form').trigger('reset').slideUp();
                          window.location.reload();
                        }
                    }
                });
  });

  $('.check').on('click',function(){
    $('.check').prop('checked',false);
    $(this).prop('checked',true);
  });

  $('.select-date').on('click',function(){
    $('.select-date').removeClass('active');
    $(this).addClass('active');
  });

  $('.select-time').on('click',function(){
    $('.select-time').removeClass('active');
    $(this).addClass('active');
  });
});
  
</script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) { 
  //do work
  function demoSuccessHandler(transaction) {
        // You can write success code here. If you want to store some data in database.
        // $("#paymentDetail").removeAttr('style');
        // $('#paymentID').text(transaction.razorpay_payment_id);
        // var paymentDate = new Date();
        // $('#paymentDate').text(
        //         padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
        //         );

        $.ajax({
            method: 'post',
            url: "dopayment",
            data: {
                "_token": "{{ csrf_token() }}",
                "razorpay_payment_id": transaction.razorpay_payment_id
            },
            complete: function (r) {
                var amount = $('#paynow').attr('data-price');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var timeid = $('.select-time.active').attr('id');
                var address = $("input:checkbox[name=address_check]:checked").attr('id');
                var date = $('.select-date.active').attr('data-value');
                $.ajax({
                    /* the route pointing to the post function */
                    url: "confirm_items",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN , amount: amount ,  id:transaction.razorpay_payment_id,timeid:timeid,address:address,date:date},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        {
                          window.location = 'ordersentkitchen';
                        }
                    }
                });
                // console.log('complete');
                // window.location = '/ordersentkitchen';
                // alert('payment_done');
                // console.log(r);
            }
        })
    }


  document.getElementById('paynow').onclick = function () {
// alert($("input:checkbox[name=address_check]:checked").attr('id'));
// alert($('.select-date.active').attr('data-value'));
    if ($('input[type=checkbox]').is(":checked")) {
      //any one is checked
       var options = {
        key: "{{ env('RAZORPAY_KEY') }}",
        amount: $('#paynow').attr('data-price'),
        name: 'VoilaDelivery',
        description: 'Food Items',
        image: '/assets/img/apple-touch-icon-ipad-retina-display.png',
        handler: demoSuccessHandler
    }
      window.r = new Razorpay(options);
        r.open()
    }
    else {
    //none is checked
    alert('Please Select Address');
    }

     
    }
});
   
</script>

@endsection