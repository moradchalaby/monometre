
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Kategori Düzenleme
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('category.update',$categories->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="category_file" id="">
        </div>
    </div>

    </div>



     <div class="form-group">
        <label for="">Yüklü Görsel</label>
    <div class="row">
        <div class="col-xs-12">
             @isset($categories->category_file)
                     <img class="img-thumbnail" width="250"  src="/images/categories/{{$categories->category_file}}">
@else
<div class="alert alert-danger text-center">Görsel Yüklü Değil</div>
@endisset
        </div>
    </div>

    </div>


    <div class="form-group">
        <label for="">Marka İsmi</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$categories->category_title}}" required name="category_title" id="">
        </div>
    </div>
    </div>


  {{--   <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$categories->category_slug}}" name="category_slug" id="">
        </div>
    </div>
    </div> --}}

 <div class="form-group">
        <label for="">Marka Web Site Adresi</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$categories->category_url}}" name="category_url" id="">
        </div>
    </div>
    </div>


{{--
    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="category_content" required cols="30" rows="10">
           {{$categories->category_content}}
       </textarea>
       <script>
CKEDITOR.replace('editor1');
           </script>

        </div>
    </div>

    </div> --}}
 <div class="form-group">
        <label for="">Durum</label>
    <div class="row">
        <div class="col-xs-12">
            <select name="category_status" class="form-control" id="">
                <option value="1" {{$categories->category_status=="1" ? "selected":""}}>Aktif</option>
                <option value="0" {{$categories->category_status=="0" ? "selected":""}}>Pasif</option>
            </select>
        </div>
    </div>
    </div>

    <input type="hidden" name="old_file" value="{{$categories->category_file}}">


    <div class="box-footer" align="right">
        <button class="btn btn-success" type="submit">Düzenle</button>
    </div>
    </div>

</form>
       </div>
   </div>
</section>



@endsection

@section('css') @endsection
@section('js') @endsection
