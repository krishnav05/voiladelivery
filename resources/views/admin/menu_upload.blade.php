
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
  <thead>
    <tr>
      <th scope="col">Unique Category Id</th>
      <th scope="col">Category Name</th>
      <!-- <th scope="col">* Category Image</th> -->
      <th scope="col">Is Pure Veg?</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" class="form-control" placeholder="Category ID"></td>
      <td><input type="text" class="form-control" placeholder="Category Name"></td>
      <td>
		<select class="form-control" id="exampleFormControlSelect1">
	      <option>Yes</option>
	      <option>No</option>
	    </select>
      </td>
      <td><button type="button" class="btn btn-success">Add</button></td>
    </tr>
  </tbody>
  <br>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Is Pure Veg</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($category as $cat)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$cat['category_id']}}</td>
      <td>{{$cat['category_name']}}</td>
      <td>@if($cat['is_pure_veg'] == 1)
      Yes @else No @endif</td>
      <td><button type="button" class="btn btn-primary"><i class="fas fa-pen"></i></button> <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
</table>
  </div>
  <!-- Items upload div -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">Unique Item Id</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Description</th>
      <th scope="col">Item Price</th>
      <th scope="col">Veg/Non Veg</th>
      <th scope="col">Category</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" class="form-control" placeholder="Unique Item ID"></td>
      <td><input type="text" class="form-control" placeholder="Item Name"></td>
      <td><input type="text" class="form-control" placeholder="Item Description"></td>
      <td><input type="text" class="form-control" placeholder="Item Price"></td>
      <td>
        <select class="form-control" id="">
        <option>Veg</option>
        <option>Non Veg</option>
      </select>
      </td>
      <td>
        <select class="form-control" id="">
        <option>Yes</option>
        <option>No</option>
      </select>
      </td>
      <td><button type="button" class="btn btn-success">Add</button></td>
    </tr>
  </tbody>
</table>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Unique Item ID</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Description</th>
      <th scope="col">Item Price</th>
      <th scope="col">Veg/Non Veg</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($category_items as $cat_items)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$cat_items['item_id']}}</td>
      <td>{{$cat_items['item_name']}}</td>
      <td>{{$cat_items['item_description']}}</td>
      <td>{{$cat_items['item_price']}}</td>
      <td>{{$cat_items['item_vegetarian']}}</td>
      @foreach($category as $cat)
      @if($cat_items['category_id'] == $cat['category_id'])
      <td>{{$cat['category_name']}}</td>
      @endif
      @endforeach
      <td><button type="button" class="btn btn-primary"><i class="fas fa-pen"></i></button> <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

@endsection

@section('js')


@stop

@section('css')

@stop