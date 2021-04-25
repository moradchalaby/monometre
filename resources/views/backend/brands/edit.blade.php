
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Marka Düzenleme
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('brand.update',$brands->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="brand_file" id="">
        </div>
    </div>

    </div>



     <div class="form-group">
        <label for="">Yüklü Görsel</label>
    <div class="row">
        <div class="col-xs-12">
             @isset($brands->brand_file)
                     <img class="img-thumbnail" width="250"  src="/images/brands/{{$brands->brand_file}}">
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
            <input class="form-control" type="text" value="{{$brands->brand_title}}" required name="brand_title" id="">
        </div>
    </div>
    </div>


  {{--   <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$brands->brand_slug}}" name="brand_slug" id="">
        </div>
    </div>
    </div> --}}

 <div class="form-group">
        <label for="">Marka Web Site Adresi</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$brands->brand_url}}" name="brand_url" id="">
        </div>
    </div>
    </div>


{{--
    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="brand_content" required cols="30" rows="10">
           {{$brands->brand_content}}
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
            <select name="brand_status" class="form-control" id="">
                <option value="1" {{$brands->brand_status=="1" ? "selected":""}}>Aktif</option>
                <option value="0" {{$brands->brand_status=="0" ? "selected":""}}>Pasif</option>
            </select>
        </div>
    </div>
    </div>

    <input type="hidden" name="old_file" value="{{$brands->brand_file}}">


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
