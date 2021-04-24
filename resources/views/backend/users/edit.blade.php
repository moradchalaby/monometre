@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Kullanıcı Düzenleme
                </h3>
            </div>
            <div class="box-body">
                <form action="{{ route('user.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="user_file" id="">
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="">Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                @isset($users->user_file)
                                    <img class="img-thumbnail" width="250" src="/images/users/{{ $users->user_file }}">
                                @else
                                    <div class="alert alert-danger text-center">Görsel Yüklü Değil</div>
                                @endisset
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="">Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" value="{{ $users->name }}" required name="name"
                                    id="">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Kullanıcı Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control replace" type="text" value="{{ $users->username }}"
                                    name="username" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" value="{{ $users->email }}" name="email" id="">
                            </div>
                        </div>
                    </div>
                     <div class="form-group  text-left">
                            <a class="btn btn-warning" onclick="passDegis()">
                                Şifre Değiştir
                            </a>
                            {{-- <input class="form-check-input" type="checkbox"  value=""
                                id="defaultCheck1"> --}}

                        </div>
                    <div class="form-group" style="display: none; " id="passDiv">
                        <label for="">Yeni Şifre</label>
                        <div class="row">
                            <div class="col-xs-12 ">
                                <input class="form-control" type="password" id="passInput" name="" id="">
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
                <label for="">Durum</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="user_status" class="form-control" id="">
                            <option value="1" {{ $users->user_status == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $users->user_status == '0' ? 'selected' : '' }}>Pasif</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" name="old_file" value="{{ $users->user_file }}">


            <div class="box-footer" align="right">
                <button class="btn btn-success" type="submit">Düzenle</button>
            </div>
        </div>

        </form>
        </div>
        </div>
    </section>



    <script>
        function passDegis() {
            var y = document.getElementById("passDiv");
            if (y.style.display == "none") {
                y.style.display = "";
            } else {
                y.style.display = "none";
            }
            var x = document.getElementById("passInput");
            if (x.name === "password") {
                x.name = "";
            } else {
                x.name = "password";
            }

        }

        function  passShow() {
            var x = document.getElementById("passInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".replace").keyup(function() {

                if (this.value.match(' ')) {

                    this.value = this.value.replace(' ', '');

                }

            });
            $(".replace").on("keyup", function() {
                str = $(this).val();
                var dizi = {
                    "İ": "I",
                    "Ş": "S",
                    "Ğ": "G",
                    "Ü": "U",
                    "Ö": "O",
                    "Ç": "C",
                    "ş": "s",
                    "ğ": "g",
                    "ü": "u",
                    "ö": "o",
                    "ç": "c"
                };
                str = str.replace(/(([İŞĞÜÖÇşğüöç]))+/g, function(harf) {
                    return dizi[harf];
                })
                $(this).val(str);

            });



        });

    </script>
@endsection

@section('css') @endsection
@section('js') @endsection
