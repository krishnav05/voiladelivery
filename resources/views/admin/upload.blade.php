
@extends('adminlte::page')


@section('content')

<h5>Upload Category In English </h5>

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
     </form>

@endsection


@section('js')



@stop


@section('css')



@stop