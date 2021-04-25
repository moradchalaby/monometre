@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Yeni Kullanıcı Ekle
                </h3>
            </div>
            <div class="box-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="user_file" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" value="" name="name" id="">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Kullanıcı Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control replace"  id="kadi" type="text" value=""  name="username" id="">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">E-mail</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" value=""  name="email" id="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Şifre</label>
                        <div class="row">
                            <div class="col-xs-12 ">
                                <input class="form-control passInput" type="password" id="passInput" value="" required name="password"
                                    id="">
                            </div>


                    </div>
                    <div class="form-check form-check-inline text-right">
                            <label class="form-check-label" for="defaultCheck1">
                                Göster
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="passShow()" value=""
                                id="defaultCheck1">

                        </div>
                        </div>
                    <div class="form-group">
                        <label for="">Şifre Tekrarı</label>
                        <div class="row">
                            <div class="col-xs-12 ">
                                <input class="form-control" type="password" id="passcInput" value="" required
                   name="password_confirmation"
                                    id="">
                            </div>

                        </div>
                        <div class="form-check form-check-inline text-right">
                            <label class="form-check-label" for="defaultCheck1">
                                Göster
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="passcShow()" value=""
                                id="defaultCheck1">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="user_status" class="form-control" id="">
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

    <script>
        function passShow() {
            var x = document.getElementById("passInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

function passcShow() {
            var z = document.getElementById("passcInput");
            if (z.type === "password") {
                z.type = "text";
            } else {
                z.type = "password";
            }
        }

    </script>

    <script type="text/javascript">
$(document).ready(function(){
     $(".replace").keyup(function () {

  if (this.value.match(' ')){

    this.value = this.value.replace(' ','');

  }

});
	$(".replace").on("keyup", function(){
			str = $(this).val();
			var dizi = { "İ": "I", "Ş": "S", "Ğ": "G", "Ü": "U", "Ö": "O", "Ç": "C",  "ş": "s", "ğ": "g", "ü": "u", "ö": "o", "ç": "c" };
			str = str.replace(/(([İŞĞÜÖÇşğüöç]))+/g, function(harf){ return dizi[harf]; })
			$(this).val(str);

	});



});
</script>

@endsection

@section('css') @endsection
@section('js') @endsection
