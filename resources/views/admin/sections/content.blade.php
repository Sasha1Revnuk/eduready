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


<!-- END Navigation info -->

    <!-- Search Results -->
    <div class="page-header page-header-top clearfix">
        <div class="row">
            <h4 class="text-center">Секція {{$data['section']->title}} <a href="{{'/adm/sections/update?id=' . $data['section']->id}}" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i></a> <a href="{{'/adm/sections/conf-delete?id=' . $data['section']->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></h4>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="{{'/adm/courses/edit?id=' . $data['section']->course_id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                <a href="{{'/adm/lessons/add?section=' . $data['section']->id}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати урок</a>
            </div>
        </div>
    </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Назва</th></tr>
            </thead>
            <tbody>
            @foreach($data['section']->lessons as $lesson)
            <tr>
                <td class="text-center">{{$lesson->id}}</td>
                <td><a href="{{'/adm/lessons/edit?id=' . $lesson->id}}">{{$lesson->title}}</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
@endsection