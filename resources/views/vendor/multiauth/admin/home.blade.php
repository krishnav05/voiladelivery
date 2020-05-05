
@extends('adminlte::page')

@section('content')
<h2 style="text-align: center;">Upload Csv</h2>
<form method='post' action='/uploadFile' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>



<h2 style="text-align: center;">Orders</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Address</th>
      <th scope="col">Items</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kitchen as $items)
    @foreach($user as $key)
    @if($items['user_id'] == $key['id'])
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{$key['name']}}</td>
      <td>{{$key['phone']}}</td>
      <td>Sector 41, Noida</td>
      <td>Bahwalpul Ganne Ka Ras</td>
      <td>@if($items['restaurant_status'] == null) Pending @else {{$items['restaurant_status']}} @endif</td>
      <td><a href="prepare/{{$items['id']}}"><button type="button" class="btn btn-success">
      @if($items['restaurant_status'] == 'Preparing') Out For Delivery @elseif($items['restaurant_status'] == 'Out For Delivery') Delivered @else Preparing @endif</button></a>
    </td>
    </tr>
    @endif
    @endforeach
    @endforeach
  </tbody>
</table>

@endsection

@section('js')
    <script type="text/javascript">
 setTimeout(function(){
   location.reload();
 },30000);
</script>
@stop