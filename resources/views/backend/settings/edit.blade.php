
@extends('backend.layout')

@section('content')
<section class="content-header">
   <div class="box box-primary">
       <div class="box-header with-border">
           <h3 class="box-title">
Settings
           </h3>
       </div>
       <div class="box-body">
<form action="{{route('settings.Update', ['id'=>$settings->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Açıklama</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" type="text" readonly value="{{$settings->settings_description}}" name="" id="">
        </div>
    </div>
    </div>
    @if ($settings->settings_type == "file")

    <div class="form-group">
        <label for="">Resim Seç</label>
    <div class="row">
        <div class="col-xs-12">
            <input class="form-control" name="settings_value" required type="file" name="" id="">
        </div>
    </div>
    </div>
    @endif

    <div class="form-group">
        <label for="">İçerik</label>
    <div class="row">
        <div class="col-xs-12">

            @if ($settings->settings_type == "text")
            <input class="form-control" type="text" name="settings_value" required value="{{$settings->settings_value}}">
       @endif

 @if ($settings->settings_type == "file")
<div class="text-center col-xs-12" >
                <img class="img-thumbnail" width="250"  src="/images/settings/{{$settings->settings_value}}">
</div>
       @endif

        @if ($settings->settings_type == "textarea")

       <textarea class="form-control" id="editor1" name="settings_value" required cols="30" rows="10">{{$settings->settings_value}}</textarea>
       <script>
CKEDITOR.replace('editor1');
           </script>
       @endif
        </div>
    </div>
    @if ($settings->settings_type == "file")
<input type="hidden" name="old_file" value="{{$settings->settings_value}}">
       @endif
    <div class="box-footer" align="right">
        <button class="btn btn-success" type="submit"> Düzenle</button>
    </div>
    </div>

</form>
       </div>
   </div>
</section>



@endsection

@section('css') @endsection
@section('js') @endsection
