
@extends('backend.layout')

@section('content')
<section class="content-header">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Kullanıcılar
            </h3>
            <div align="right">
                <a href="{{route('user.create')}}" class="btn btn-success">Yeni Ekle</a>
            </div>
        </div>
        <div class="box-body">
            <table id="tablem" class="table table-striped">
                <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>
                            Ad Soyad
                        </th>
                        <th>

                        </th>
                    </tr>
                <tbody id="sortable">
                    @foreach($data['user'] as $user)
                    <tr id="item-{{$user->id}}">
                        <td width="150" class="sortable"><img class="img-thumbnail" width="150"
                                src="/images/users/{{$user->user_file}}"></td>
                        <td>{{$user->name}}</td>

                        <td width="5"><a href="{{route('user.edit',$user->id)}}"><i class="fas fa-pencil-alt"></i></a>
                        </td>

                        <td width="5"><a href="javascript:void(0)"><i id="@php  echo $user->id  @endphp"
                                    class="fas fa-trash-alt"></i></a></td>

                    </tr>

                    @endforeach
                </tbody>
                </thead>

            </table>
        </div>
    </div>
</section>


    <script type="text/javascript">
    //? AJAX
        $(function(){

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('user.Sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem başarılı");

                            } else {
                                alertify.error("İşlem başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });


        $(".fa-trash-o").click(function () {
            destroy_id=$(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
            function () {
                $.ajax({
                    type:"DELETE",
                    url:"user/"+destroy_id,
                    success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                $("#item-"+destroy_id).remove();
                                alertify.success("Silme İşlemi Başarılı");

                            } else {
                                alertify.error("Silme İşlemi Başarısız");
                            }
                        }
                });
            },
            function () {
               alertify.error('Silme işlemi iptal edildi');
            }
            );
        })
    </script>


@endsection

@section('css') @endsection
@section('js') @endsection
