
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Yeni Ürün Ekle
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="product_file" id="">
        </div>
    </div>
    </div>
    <div class="form-group">
        <label for="">Başlık</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" required name="product_title" id="">
        </div>
    </div>
    </div>


    {{-- <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" name="product_slug" id="">
        </div>
    </div>
    </div> --}}
<div class="form-group">
        <label for="">Kategori</label>
    <div class="row">
        <div class="col-xs-12">
            <select name="product_category" class="form-control" id="">
                @foreach ($category as $categ)


                <option value="{{$categ->id}}" >{{$categ->category_title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>

<div class="form-group">
        <label for="">Fiyat</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="" required name="product_price" id="">
        </div>
    </div>
    </div>

    <div class="form-group">
        <label for="">Stok</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="number" value="" required name="product_stock" id="">
        </div>
    </div>
    </div>


    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="product_content" required cols="30" rows="10"></textarea>
       <script>
CKEDITOR.replace('editor1');
           </script>

        </div>
    </div>

    </div>
 <div class="form-group">
        <label for="">Durum</label>
    <div class="row">
        <div class="col-xs-12">
            <select name="product_status" class="form-control" id="">
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
