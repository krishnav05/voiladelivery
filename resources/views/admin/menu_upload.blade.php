
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
      <td><input name="category_id" type="text" class="form-control" placeholder="Category ID"></td>
      <td><input name="category_name" type="text" class="form-control" placeholder="Category Name"></td>
      <td>
		<select id="category-option" name="category_property" class="form-control" id="exampleFormControlSelect1">
	      <option value="yes">Yes</option>
	      <option value="no">No</option>
	    </select>
      </td>
      <td><button type="button" class="btn btn-success category-add">Add</button></td>
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
      <td><!-- <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i></button>  --><button id="{{$cat['id']}}" type="button" class="btn btn-danger category-delete"><i class="fas fa-times"></i></button></td>
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
      <td><input name="item_id" type="text" class="form-control" placeholder="Unique Item ID"></td>
      <td><input name="item_name" type="text" class="form-control" placeholder="Item Name"></td>
      <td><input name="item_description" type="text" class="form-control" placeholder="Item Description"></td>
      <td><input name="item_price" type="text" class="form-control" placeholder="Item Price"></td>
      <td>
        <select id="item-option" class="form-control" id="">
        <option value="veg">Veg</option>
        <option value="nonveg">Non Veg</option>
      </select>
      </td>
      <td>
        <select id="item-category" class="form-control" id="">
          @foreach($category as $cat)
        <option value="{{$cat['category_id']}}">{{$cat['category_name']}}</option>
          @endforeach
      </select>
      </td>
      <td><button type="button" class="btn btn-success item-add">Add</button></td>
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
      <td><!-- <button type="button" class="btn btn-primary edit-item" data-toggle="modal" data-target="#itemEditModal"><i class="fas fa-pen"></i></button> --> <button id="{{$cat_items['id']}}" type="button" class="btn btn-danger delete-item"><i class="fas fa-times"></i></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>
<!-- modal for category -->
<!-- <div class="modal" tabindex="-1" role="dialog" id="itemEditModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Item Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Item Name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- modal for items -->
@endsection

@section('js')
<script type="text/javascript">
$('.category-add').on('click',function(){
    var id = $('input[name="category_id"]').val();
    var name = $('input[name="category_name"]').val();
    var option = $('#category-option').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "category",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, action: 'category',id:id , name:name , option:option},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        { 
                          $('input[name="category_id"]').val('');
                          $('input[name="category_name"]').val('');
                          window.location.reload();
                        }
                    }
                });
});

$('.item-add').on('click',function(){
    var id = $('input[name="item_id"]').val();
    var name = $('input[name="item_name"]').val();
    var description = $('input[name="item_description"]').val();
    var price = $('input[name="item_price"]').val();
    var itemoption = $('#item-option').val();
    var itemcategory = $('#item-category').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "category",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, action: 'category-item',id:id , name:name , description:description,price:price,itemoption:itemoption,itemcategory:itemcategory},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        { 
                          $('input[name="item_id"]').val('');
                          $('input[name="item_name"]').val('');
                          $('input[name="item_description"]').val('');
                          $('input[name="item_price"]').val('');
                          window.location.reload();
                        }
                    }
                });
});

$('.category-delete').on('click',function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "delete",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, action: 'category',id:this.id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        {
                          window.location.reload();
                        }
                    }
                });
});

$('.delete-item').on('click',function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "delete",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, action: 'category-item',id:this.id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        {
                          window.location.reload();
                        }
                    }
                });
});



</script>

@stop

@section('css')

@stop