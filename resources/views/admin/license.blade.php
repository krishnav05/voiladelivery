
@extends('adminlte::page')

@section('content')

@if($status == 0)
<center>
  <h5 style="color: red;">
Please Activate the product to continue using it.</h5>
<br>
<br>
<form class="form-inline" method="POST" action="update_license">
  @csrf
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Key</label>
    <input type="text" readonly class="form-control-plaintext" value="Enter License Key">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="key" class="sr-only">Key</label>
    <input name="key" type="text" class="form-control" placeholder="Enter License Key" value="">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Activate</button>
</form>

</center>
@else
<center>
<h5 style="color: green;">Your Product has been Activated</h5>
</center>
@endif

@endsection

@section('js')


@stop

@section('css')

@stop