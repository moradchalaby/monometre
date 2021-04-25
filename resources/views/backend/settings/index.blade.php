
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
           <table class="table table-striped">
               <thead>
               <tr>
                   <th>Id</th>
                   <th>
                       Açıklama
                   </th>
                   <th>İçerik</th>
                   <th>Anahtar Değer</th>
                   <th>Type</th>
                   <th>

                   </th>
               </tr>
               <tbody id="sortable">
               @foreach($data['adminSettings'] as $adminSettings)
               <tr id="item-{{$adminSettings->id}}">
                   <td>{{$adminSettings->id}}</td>
                   <td class="sortable">{{$adminSettings['settings_description']}}</td>
                <td>
                     @if ($adminSettings['settings_type'] == "file")

                <img class="img-thumbnail" width="100"  src="/images/settings/{{$adminSettings['settings_value']}}">

       @else
       @php  @endphp

                {{$adminSettings['settings_value']}}

       @endif
    </td>
                   <td>{{$adminSettings->settings_key}}</td>
                   <td>{{$adminSettings->settings_type}}</td>
                   <td width="5"><a href="{{route('settings.Edit',['id'=> $adminSettings->id])}}"><i class="fas fa-pencil-alt"></i></a>
                       </td>
                       @if ($adminSettings->settings_delete)
                   <td width="5"><a href="javascript:void(0)"><i id="@php  echo $adminSettings->id  @endphp" class="fas fa-trash-alt"></i></a></td>
              @endif
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
                        url: "{{route('settings.Sortable')}}",
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
                location.href="/nedmin/settings/delete/"+destroy_id;
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
