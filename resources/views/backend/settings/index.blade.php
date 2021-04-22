
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
               <tbody>
               @foreach($data['adminSettings'] as $adminSettings)
               <tr>
                   <td>{{$adminSettings->id}}</td>
                   <td>{{$adminSettings['settings_description']}}</td>
                   <td>{{$adminSettings->settings_value}}</td>
                   <td>{{$adminSettings->settings_key}}</td>
                   <td>{{$adminSettings->settings_type}}</td>
                   <td width="5"><a href="javascript:void(0)"><i class="fa fa-pencil-square"></i></a>
                       </td>
                   <td width="5"><a href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
               </tr>
               @endforeach
               </tbody>
               </thead>
           </table>
       </div>
   </div>
</section>

@endsection

@section('css') @endsection
@section('js') @endsection
