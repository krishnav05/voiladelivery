
@extends('adminlte::page')

@section('content')
<h1 style="text-align: center;">Create Menu</h1>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Edit Categories</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Items w.r.t Catgories</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
	<!-- categories upload div -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  	<table class="table">
  	<strong>* marked fields are optional</strong> 
  <thead>
    <tr>
      <th scope="col">Unique Category Id</th>
      <th scope="col">Category Name (English)</th>
      <th scope="col">* Category Name (Hindi)</th>
      <th scope="col">* Category Image</th>
      <th scope="col">Is Pure Veg?</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" class="form-control" placeholder="Category ID"></td>
      <td><input type="text" class="form-control" placeholder="Name In English"></td>
      <td><input type="text" class="form-control" placeholder="Name In Hindi"></td>
      <td>
	    
      </td>
      <td>
		<select class="form-control" id="exampleFormControlSelect1">
	      <option>Yes</option>
	      <option>No</option>
	    </select>
      </td>
      <td><button type="button" class="btn btn-success">Add</button></td>
    </tr>
  </tbody>
</table>
  </div>
  <!-- Items upload div -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
  </div>
</div>

@endsection

@section('js')


@stop

@section('css')

@stop