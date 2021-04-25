
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Yeni Marka Ekle
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="brand_file" id="">
        </div>
    </div>
    </div>
    <div class="form-group">
        <label for="">Marka İsmi</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" required name="brand_title" id="">
        </div>
    </div>
    </div>


{{--     <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" name="brand_slug" id="">
        </div>
    </div>
    </div> --}}

    <div class="form-group">
        <label for="">Marka Web Site Adresi</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" name="brand_url" id="">
        </div>
    </div>
    </div>





    {{-- <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="brand_content" required cols="30" rows="10"></textarea>
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
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
            </select>
        </div>
    </div>
    </div>


    <div class="box-footer" align="right">
        <button class="btn btn-success" type="submit">Ekle</button>
    </div>
    </div>

</form>
       </div>
   </div>
</section>



@endsection

@section('css') @endsection
@section('js') @endsection
