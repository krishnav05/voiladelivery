
@extends('adminlte::page')

@section('content')

<div class="row">
	
	<div class="col">
		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fas fa-align-justify"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">ORDERS</span>
          <span class="info-box-number">93,139</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
	</div>
	<div class="col">
		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-green"><i class="fas fa-rupee-sign"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL REVENUE</span>
          <span class="info-box-number">₹ 1,93,139</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
	</div>

</div>

@endsection

@section('js')

@stop

@section('css')
    
@stop