
@extends('adminlte::page')


@section('content')

<!-- <h5>Upload Category In English </h5>

<form method='post' action='uploadCategory' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
<br>
<h5>Upload Category Items In English </h5>

<form method='post' action='uploadCategoryItem' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
<br>
<h5>Upload Category In Hindi </h5>

<form method='post' action='uploadHindiCategory' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
<br>
<h5>Upload Category Items In Hindi </h5>

<form method='post' action='uploadHindiCategoryItems' enctype='multipart/form-data' >
       {{ csrf_field() }}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form> -->
<div class="container">
                    
<h5>Upload Category In English </h5>

<form method="post" action="uploadCategory" enctype="multipart/form-data" style="border-bottom: 1px solid #e4e4e4;padding:1rem;">
       {{csrf_field()}}
       <input type="file" name="file">
       <input type="submit" name="submit" value="Import">
     </form>
<br>
<h5 class="mt-5">Upload Category Items In English </h5>

<form method="post" action="uploadCategoryItem" enctype="multipart/form-data" style="border-bottom: 1px solid #e4e4e4;padding:1rem;">
       {{csrf_field()}}
       <input type="file" name="file">
       <input type="submit" name="submit" value="Import">
     </form>
<br>
<h5 class="mt-5">Upload Category In Hindi </h5>

<form method="post" action="uploadHindiCategory" enctype="multipart/form-data" style="border-bottom: 1px solid #e4e4e4;padding:1rem;">
       {{csrf_field()}}
       <input type="file" name="file">
       <input type="submit" name="submit" value="Import">
     </form>
<br>
<h5 class="mt-5">Upload Category Items In Hindi </h5>

<form method="post" action="uploadHindiCategoryItems" enctype="multipart/form-data" style="border-bottom: 1px solid #e4e4e4;padding:1rem;">
       {{csrf_field()}}
       <input type="file" name="file">
       <input type="submit" name="submit" value="Import">
     </form>

</div>
@endsection


@section('js')



@stop


@section('css')



@stop