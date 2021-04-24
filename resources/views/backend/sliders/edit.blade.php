
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Slider Düzenleme
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('slider.update',$sliders->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="slider_file" id="">
        </div>
    </div>

    </div>



     <div class="form-group">
        <label for="">Yüklü Görsel</label>
    <div class="row">
        <div class="col-xs-12">
             @isset($sliders->slider_file)
                     <img class="img-thumbnail" width="250"  src="/images/sliders/{{$sliders->slider_file}}">
@else
<div class="alert alert-danger text-center">Görsel Yüklü Değil</div>
@endisset
        </div>
    </div>

    </div>


    <div class="form-group">
        <label for="">Başlık</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$sliders->slider_title}}" required name="slider_title" id="">
        </div>
    </div>
    </div>


    <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$sliders->slider_slug}}" name="slider_slug" id="">
        </div>
    </div>
    </div>

 <div class="form-group">
        <label for="">Url</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$sliders->slider_url}}" name="slider_url" id="">
        </div>
    </div>
    </div>



    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="slider_content" required cols="30" rows="10">
           {{$sliders->slider_content}}
       </textarea>
       <script>
CKEDITOR.replace('editor1');
           </script>

        </div>
    </div>

    </div>
 <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <select name="slider_status" class="form-control" id="">
                <option value="1" {{$sliders->slider_status=="1" ? "selected":""}}>Aktif</option>
                <option value="0" {{$sliders->slider_status=="0" ? "selected":""}}>Pasif</option>
            </select>
        </div>
    </div>
    </div>

    <input type="hidden" name="old_file" value="{{$sliders->slider_file}}">


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
