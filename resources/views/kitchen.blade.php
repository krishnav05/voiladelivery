@extends('layout.master')

@section('content')
<body class="kitchen-bg">
@if($kitchen == null)

<div class="container">
 <div class="row pt-4">
  <div class="col-sm-6 text-left">
    <a href="menu" class="next-prev-menu-item"> 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
        <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
          <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
            <rect width="16" height="16" stroke="none"/>
            <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
          </g>
          <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
        </g>
      </svg>
      Menu
    </a>
  </div>
  <div class="col-sm-6 text-right">

  </div>

</div>
<div class="row mt-5">
 <div class="col-sm-12 text-center">
   <img src="{{asset('assets/img/ic-kitchen.svg')}}" class="">
 </div>
 <div class="col-sm-12 text-center mt-3">
   <h1>No Item Kitchen</h1>
 </div>
</div>
<div class="container mt-5 pt-3">
 <div class="row mt-5">
   <div class="col-sm-12 text-center"> <img src="{{asset('assets/img/ic-kitchen-empty.png')}}"> </div>
 </div>
</div>


<div class="row fixed-bottom">
 <input type="submit" name="" value="GO TO MENU" onclick="window.location = 'menu';" class="btn btn-primary col rounded-0">

</div>
<!-- <div class="row mt-3 text-center">
  <p class="col text-center">
   Are you facing any problem to place order? <a href="#"><img src="{{asset('assets/img/ic-call-server-2.svg')}}" class="d-inline"></a>
 </p>
</div> -->

</div>

@else
<div class="container">
 <div class="row pt-4">
  <div class="col-sm-6 text-left">
    <a href="menu" class="next-prev-menu-item"> 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
        <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
          <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
            <rect width="16" height="16" stroke="none"/>
            <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
          </g>
          <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
        </g>
      </svg>
      Menu
    </a>
  </div>
  <div class="col-sm-6 text-right">

  </div>

</div>
<div class="row mt-5">
 <div class="col-sm-12 text-center">
   <img src="{{asset('assets/img/ic-kitchen.svg')}}" class="">
 </div>
 <div class="col-sm-12 text-center mt-3">
   <h1>Kitchen</h1>
 </div>
</div>

<div class="table-responsive mt-5">
  <table class="table table-borderless">
    <thead>
      <tr class="text-center">
        <th scope="col text-center">S.NO.</th>
        <th scope="col text-center">ITEM</th>
        <th scope="col">PRICE</th>
      </tr>
      @foreach($kitchen as $kitchenitem)
      @foreach($category_items as $item)
      @if($kitchenitem['item_id'] == $item['item_id'])
      <tr>
        <td class="text-center"> {{$count++}} </td>
        <td>
         <h2 class="change-txt-size"><img src="{{asset('assets/img/ic-'.$item['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline"> <a>{{$item['item_name']}}</a></h2>

             <!-- <p class="item-contains change-txt-size"> 
              Addons: Salt, Sugar, Honey, Mint Notes: Less water, more ice 
            </p> -->

            <div class="row kitchne-add-to">
              <div class="col-sm-12 pl-0">
                <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto" style="display: none;" id="{{$item['item_id']}}"> <img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
                <div class="input-group" style="display: block;">

                  <button class="btn btn-light btn-sm float-left kitchen-minus" id="{{$item['item_id']}}"><img src="{{asset('assets/img/ic-minus.svg')}}" class="d-inline"></button>

                  <input type="number" id="qty_input" class="add-plus-min float-left" value="{{$kitchenitem['item_quantity']}}" disabled>

                  <button class="btn btn-light btn-sm float-left kitchen-plus" id="{{$item['item_id']}}"><img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"></button>

                </div>
              </div>

            </div>

          </td>
          <td class="item-price text-center"> ₹ <span id="price_{{$item['item_id']}}">{{$item['item_price'] * $kitchenitem['item_quantity']}}</span> </td>
        </tr>
        @endif
        @endforeach
        @endforeach 
      </thead>

    </table>
  </div>  
  @guest
  <div class="row fixed-bottom mt-5">
   <input onclick="window.location = 'otplogin';" type="submit" name="" value="CONTINUE TO PLACE ORDER" class="btn btn-primary col rounded-0">
 </div>
 @else
 <div id="snackbar">Minimum order value required ₹999</div>
 <div class="row fixed-bottom mt-5" id="payclass">
   <input id="paynow" type="submit" name="" data-price="{{$total_price}}" value="SELECT ADDRESS, DATE & TIME" class="btn btn-primary col rounded-0">
 </div>
 @endif

</div>
@endif
@endsection

@section('footer')

<script>
    // $('#rzp-footer-form').submit(function (e) {
    //     // var button = $(this).find('button');
    //     // var parent = $(this);
    //     // button.attr('disabled', 'true').html('Please Wait...');
    //     $.ajax({
    //         method: 'get',
    //         url: this.action,
    //         data: $(this).serialize(),
    //         complete: function (r) {
    //             console.log('complete');
    //             console.log(r);
    //         }
    //     })
    //     return false;
    // })
</script>

<script>
    // function padStart(str) {
    //     return ('0' + str).slice(-2)
    // }

    // function demoSuccessHandler(transaction) {
    //     // You can write success code here. If you want to store some data in database.
    //     // $("#paymentDetail").removeAttr('style');
    //     // $('#paymentID').text(transaction.razorpay_payment_id);
    //     // var paymentDate = new Date();
    //     // $('#paymentDate').text(
    //     //         padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
    //     //         );

    //     $.ajax({
    //         method: 'post',
    //         
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "razorpay_payment_id": transaction.razorpay_payment_id
    //         },
    //         complete: function (r) {
    //             console.log('complete');
    //             window.location = '/ordersentkitchen';
    //             alert('payment_done');
    //             console.log(r);
    //         }
    //     })
    // }
</script>
<script>
    
    // document.getElementById('paynow').onclick = function () {
    //   var options = {
    //     key: "{{ env('RAZORPAY_KEY') }}",
    //     amount: $('#paynow').attr('data-price'),
    //     name: 'VoilaDelivery',
    //     description: 'Food Items',
    //     image: '/assets/img/apple-touch-icon-ipad-retina-display.png',
    //     handler: demoSuccessHandler
    // }
    //   window.r = new Razorpay(options);
    //     r.open()
    // }
</script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) { 
  //do work
  $('.kitchen-minus').on('click',function(){
  var id = '#'+this.id;
  var price = '#price_' + this.id;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "kitchen_update",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id: this.id ,action: 'minus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'delete')
                          {
                            window.location.reload();
                          } 
                        if(data.status == 'success')
                        { 
                          $('#paynow').attr('data-price',data.total);
                        $(price).html(data.item_price);
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return --oldval;
                          });
                        }
                        if(data.status == 'unauthorized')
                        { 
                          $('#paynow').attr('data-price',data.total);
                        $(price).html(data.item_price);
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return --oldval;
                          });
                        }
                    }
                });
});

$('.kitchen-plus').on('click',function(){
  var id = '#'+this.id;
  var price = '#price_' + this.id;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "kitchen_update",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id: this.id ,action: 'plus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        if(data.status == 'success')
                        { 
                          $('#paynow').attr('data-price',data.total);
                        $(price).html(data.item_price);
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                        }
                        if(data.status == 'unauthorized')
                        {
                          $('#paynow').attr('data-price',data.total);
                        $(price).html(data.item_price);
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                        }
                    }
                });
});

$('#paynow').on('click',function(){
  var x = document.getElementById("snackbar");
  var price = $('#paynow').attr('data-price');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "checkminorder",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN , price:price},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        console.log(data);
                        if(data.status == 'more')
                        {
                          x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000); 
                        }
                        else
                          window.location = 'address';
                    }
                });

        
});
});
  

</script>
@endsection