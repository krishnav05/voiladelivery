@extends('multiauth::layouts.app')
@section('content')
<div class="container">
    <form class="form-inline" method="POST" action="license_generate">
  @csrf
  <button type="submit" class="btn btn-primary mb-2">Generate New License Key</button>
</form>
<br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">License Key</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($licenses as $key)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$key['key']}}</td>
      <td>@if($key['user'] == null ) NOT IN USE @else IN USE  @endif</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>



@endsection