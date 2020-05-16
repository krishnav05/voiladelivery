
@extends('adminlte::page')

@section('content')

<form class="form-inline" method="POST" action="update_tax">
	@csrf
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Description</label>
    <input type="text" readonly class="form-control-plaintext" value="Enter Tax Percentage">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="tax" class="sr-only">Tax</label>
    <input name="tax" type="number" max="30" min="5" class="form-control" placeholder="Enter Tax Percentage" value="{{$tax}}">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Update</button>
</form>

@endsection

@section('js')


@stop

@section('css')

@stop