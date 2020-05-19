
@extends('adminlte::page')

@section('content')

<div class="row">
	
	<div class="col">
		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fas fa-align-justify"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">ORDERS</span>
          <span class="info-box-number">{{$total_orders}}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
	</div>
	<div class="col">
		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-green"><i class="fas fa-rupee-sign"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL REVENUE</span>
          <span class="info-box-number">₹ {{$total_revenue}}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
	</div>
</div>
<br>
<h5>Trending Items</h5>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
    @foreach($analytics as $ana)
    @foreach($category_items as $cat)
    @if($ana['item_id'] == $cat['item_id'])
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{$cat['item_name']}}</td>
      <td>{{$ana['sum']}}</td>
    </tr>
    @endif
    @endforeach
    @endforeach
  </tbody>
</table>
@endsection

@section('js')

@stop

@section('css')
    
@stop