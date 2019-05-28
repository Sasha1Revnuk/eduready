@extends('layouts.admin.pages')
@section('content')
    <div id="page-content">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {{$error}}
                </div>
            @endforeach
        @endif
        <form action="{{route('saveSection')}}" method="post" class="form-horizontal form-box" >
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['section']) ? 'Редагування секціїї ' . $data['section']->title : 'Додати секцію'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            @if($data['action'] == 'add')
            <input type="hidden" name="courceId" value="{{$data['courceId']}}">
            @endif
        @if(isset($data['section']))
                <input type="hidden" name="section" value="{{$data['section']->id}}">
            @endif
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва секції</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['section']) ? $data['section']->title  : ''}}">
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        @if(isset( $data['section']))
                            <a href="{{'/adm/sections/edit?id=' . $data['section']->id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @else
                            <a href="{{'/adm/courses/edit?id=' . $data['courceId']}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @endif
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection