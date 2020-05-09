
@extends('adminlte::page')

@section('content')

<div class="container main-section">
    <div class="row">
      <!-- <div class="col-lg-12 hedding pb-2">
        <h1> Table Row Toggel </h1>
      </div> -->
      <div class="col-lg-12">
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
                    <td>{{$count++}} <span class="Blink">&bull;</span> </td>
                    <td>{{$order['id']}}</td>
                    <td>{{$userid['name']}}</td>
                    <td>{{$userid['phone']}}</td>
                    <td> View Items +</td>
                    <td>Online Success</td>
                    <td class="order-status-admin"> 
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
                    	</td>
                </tr>
                <tr class="p">
                    <td colspan="7" class="hiddenRow">
                      <div class="accordian-body collapse p-3 row" id="demo1">
                        <div class="col">
                          <h5> Order Details </h5>
                        	@foreach($item as $kitchenitems)
                        	@if($order['id'] == $kitchenitems['order_id'])
                        	@foreach($itemnames as $inames)
                        	@if($inames['item_id'] == $kitchenitems['item_id'])
                          <p>{{$inames['item_name']}} - {{$kitchenitems['item_quantity']}} </p>
                          <!-- <p>Note for chef will display here...</p> -->
                          @endif
                          @endforeach
                          @endif
                          @endforeach
                        </div>
                        <div class="col">
                          <h5> Delivery Details </h5>
                          <p>Delivery Date: <strong>{{$order['date']}}</strong></p>
                          <p>Delivery Time: @foreach($timeslot as $time) @if($time['id'] == $order['time_slot'])<strong> {{$time['details']}}</strong> @endif @endforeach</p>
                          <p>Name : {{$userid['name']}} </p>
                          <p>Address: {{$uaddress['name']}} , 
        {{$uaddress['flat_number']}} ,
        {{$uaddress['society']}} ,
        {{$uaddress['pincode']}} ,
        {{$uaddress['landmark']}}</p>
                          <p>Mobile : {{$userid['phone']}}</p>

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