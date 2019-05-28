@extends('layouts.admin.pages')
@section('content')
    <div id="page-content">
        @if($value = \Illuminate\Support\Facades\Session::pull('PasswordChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
        @if($value = \Illuminate\Support\Facades\Session::pull('ProfileChange'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
        @endif
            <h3 class="page-header"> Видалення секції {{\App\Models\Section::find($data['id'])->title}}</h3>
            <div class="row">
                <div class="col-md-3">
                    <h4>Видаляючи секцію, <small>ви підтверджуєте</small></h4>
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-check text-success"></i>Видалення всіх уроків в курсі</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Ви впевнені що хочете видалити секцію {{\App\Models\Section::find($data['id'])->title}} ?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{'/adm/sections/delete?action=false&id=' . $data['id']}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <a href="{{'/adm/sections/delete?id=' . $data['id']}}" class="btn btn-danger"><i class="fa fa-minus"></i> Видалити секцію</a>
                </div>
            </div>
    </div>
@endsection