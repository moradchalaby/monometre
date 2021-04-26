
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Ürün Düzenleme
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="file" name="product_file" id="">
        </div>
    </div>

    </div>



     <div class="form-group">
        <label for="">Yüklü Görsel</label>
    <div class="row">
        <div class="col-xs-12">
             @isset($products->product_file)
                     <img class="img-thumbnail" width="250"  src="/images/products/{{$products->product_file}}">
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
            <input class="form-control" type="text" value="{{$products->product_title}}" required name="product_title" id="">
        </div>
    </div>
    </div>

{{--
    <div class="form-group">
        <label for="">Slug</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$products->product_slug}}" name="product_slug" id="">
        </div>
    </div>
    </div> --}}

 <div class="form-group">
        <label for="">Kategori</label>
    <div class="row">
        <div class="col-xs-12">
            <select name="product_category" class="form-control" id="">
                @foreach ($category as $categ)


                <option value="{{$categ->id}}" {{$categ->id==$products->product_category ? "selected":""}}>{{$categ->category_title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>

    <div class="form-group">
        <label for="">Fiyat</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" value="{{$products->product_price}}" required name="product_price" id="">
        </div>
    </div>
    </div>

    <div class="form-group">
        <label for="">Stok</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="number" value="{{$products->product_stock}}" required name="product_stock" id="">
        </div>
    </div>
    </div>



    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

       <textarea class="form-control" id="editor1" name="product_content" required cols="30" rows="10">
           {{$products->product_content}}
       </textarea>
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
                <option value="1" {{$products->product_status=="1" ? "selected":""}}>Aktif</option>
                <option value="0" {{$products->product_status=="0" ? "selected":""}}>Pasif</option>
            </select>
        </div>
    </div>
    </div>

    <input type="hidden" name="old_file" value="{{$products->product_file}}">


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
