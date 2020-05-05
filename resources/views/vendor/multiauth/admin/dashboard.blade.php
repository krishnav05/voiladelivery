
@extends('adminlte::page')

@section('content')

<h2 style="text-align: center;">Orders</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>9876543210</td>
      <td>Sector 41, Noida</td>
      <td>Pending</td>
      <td><a href=""><button type="button" class="btn btn-success">Success</button></a> 
        <button type="button" class="btn btn-danger">Reject</button>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
      <td><button type="button" class="btn btn-success">Success</button> <button type="button" class="btn btn-danger">Reject</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
      <td><button type="button" class="btn btn-success">Success</button> <button type="button" class="btn btn-danger">Reject</button></td>
    </tr>
  </tbody>
</table>

@endsection
