
@extends('adminlte::page')

@section('content')

<div class="container main-section">
    <div class="row">
      <!-- <div class="col-lg-12 hedding pb-2">
        <h1> Table Row Toggel </h1>
      </div> -->
      <div class="col-lg-12">
        <h1>Past Orders</h1>
        <table class="table table-bordered" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Order Items</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              @foreach($user as $userid)
              @if($userid['id'] == $order['user_id'])
              @foreach($useraddress as $uaddress)
              @if($uaddress['id'] == $order['address_id'])
              <tr colspan="7" data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                    <td>{{$loop->iteration}} </td>
                    <td>{{$order['id']}}</td>
                    <td>{{$userid['name']}}</td>
                    <td>{{$userid['phone']}}</td>
                    <td> <span class="btn btn-outline-primary btn-sm">View Items +</span></td>
                    <td>Online Success</td>
                    <td>Delivered</td>
                    <!-- <td class="order-status-admin"> 
                      @if($order['order_status'] == 'Pending')
                      <a href="update/{{$order['id']}}/accept">Accept</a> 
                      <a href="update/{{$order['id']}}/preparing">Preparing</a>
                       <a href="update/{{$order['id']}}/out-deliv">Out For Delivery</a> 
                       <a href="update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Accepted')
                       <a href="update/{{$order['id']}}/accept" class="accept">Accept</a> 
                      <a href="update/{{$order['id']}}/preparing">Preparing</a>
                       <a href="update/{{$order['id']}}/out-deliv">Out For Delivery</a> 
                       <a href="update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Preparing')
                       <a href="update/{{$order['id']}}/accept" class="accept">Accept</a> 
                      <a href="update/{{$order['id']}}/preparing" class="preparing">Preparing</a>
                       <a href="update/{{$order['id']}}/out-deliv">Out For Delivery</a> 
                       <a href="update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Out For Delivery')
                       <a href="update/{{$order['id']}}/accept" class="accept">Accept</a> 
                      <a href="update/{{$order['id']}}/preparing" class="preparing">Preparing</a>
                       <a href="update/{{$order['id']}}/out-deliv" class="out-deliv">Out For Delivery</a> 
                       <a href="update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Delivered')
                        <a href="update/{{$order['id']}}/accept" class="accept">Accept</a> 
                      <a href="update/{{$order['id']}}/preparing" class="preparing">Preparing</a>
                       <a href="update/{{$order['id']}}/out-deliv" class="out-deliv">Out For Delivery</a> 
                       <a href="update/{{$order['id']}}/delivered" class="delivered">Delivered</a>
                       @endif 
                      </td> -->
                </tr>
                <tr class="p">
                    <td colspan="7" class="hiddenRow">
                      <div class="accordian-body collapse p-3 row" id="demo1">
                        <div class="col">
                          <h5> Order Details </h5>
                          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
@foreach($item as $kitchenitems)
                          @if($order['id'] == $kitchenitems['order_id'])
                          @foreach($itemnames as $inames)
                          @if($inames['item_id'] == $kitchenitems['item_id'])
                          <!-- <p>{{$inames['item_name']}} - {{$kitchenitems['item_quantity']}} </p> -->
                          <!-- <p>Note for chef will display here...</p> -->
                          
    <tr>
      <th scope="row">1</th>
      <td>{{$inames['item_name']}}</td>
      <td>{{$kitchenitems['item_quantity']}}</td>
      <td>₹ {{$kitchenitems['item_quantity']*$inames['item_price']}}</td>
    </tr>
    @endif
                          @endforeach
                          @endif
                          @endforeach
                          <tr>
      <th scope="row"></th>
      <td>Total Price</td>
      <td></td>
      <td>₹ {{$order['amount']/100}}</td>
    </tr>
  </tbody>
</table>
                          
                        </div>
                        <div class="col pl-5 pr-5">
                          <h5> Delivery Details </h5>
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Delivery Date</td>
                                <td><strong>{{$order['date']}}</strong></td>
                              </tr>
                              <tr>
                                <td>Delivery Time</td>
                                <td>@foreach($timeslot as $time) @if($time['id'] == $order['time_slot'])<strong> {{$time['details']}}</strong> @endif @endforeach</td>
                              </tr>
                              <tr>
                                <td>Name</td>
                                <td><strong>{{$userid['name']}}</strong> </td>
                              </tr>
                              <tr>
                                <td>Address</td>
                                <td><strong>{{$uaddress['name']}} , 
        {{$uaddress['flat_number']}} ,
        {{$uaddress['society']}} ,
        {{$uaddress['pincode']}} ,
        {{$uaddress['landmark']}}</strong></td>
                              </tr>
                              <tr>
                                <td>Mobile </td>
                                <td> <strong>{{$userid['phone']}}</strong></td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- <p>Delivery Date  <strong style="float: right;">{{$order['date']}}</strong></p>
                          <p>Delivery Time  @foreach($timeslot as $time) @if($time['id'] == $order['time_slot'])<strong style="float: right;"> {{$time['details']}}</strong> @endif @endforeach</p>
                          <p>Name  <strong style="float: right;">{{$userid['name']}}</strong> </p>
                          <p>Address<strong style="float: right;">{{$uaddress['name']}} , 
        {{$uaddress['flat_number']}} ,
        {{$uaddress['society']}} ,
        {{$uaddress['pincode']}} ,
        {{$uaddress['landmark']}}</strong> </p>
                          <p>Mobile  <strong style="float: right;">{{$userid['phone']}}</strong></p> -->

                        </div>
                    </div> 
                  </td> 
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
                @endforeach   
            </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script type="text/javascript">
  <!-- // Admin Order screen table detail toggle -->
$('.accordion-toggle').click(function(){
  $('.hiddenRow').hide();
  $(this).next('tr').find('.hiddenRow').show();
});
</script>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/admin-custom.css')}}">
@stop