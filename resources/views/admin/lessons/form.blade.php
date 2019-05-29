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
        <form action="{{route('saveLesson')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['lesson']) ? 'Редагування уроку ' . $data['lesson']->title : 'Додати урок'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            @if($data['action'] == 'add')
            <input type="hidden" name="sectionId" value="{{$data['sectionId']}}">
            @endif
            @if(isset($data['lesson']))
                <input type="hidden" name="id" value="{{$data['lesson']->id}}">
            @endif
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва уроку</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['lesson']) ? $data['lesson']->title  : ''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-file">Зображення</label>
                    <div class="col-md-3">
                        <input type="file" id="example-file" name="image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-textarea-ckeditor">Текст уроку</label>
                    <div class="col-md-10">
                        <textarea id="example-textarea-ckeditor" name="text" class="ckeditor">{{isset($data['lesson']) ? $data['lesson']->text : ''}}</textarea>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        @if(isset( $data['lesson']))
                            <a href="{{'/adm/sections/edit?id=' . $data['lesson']->section_id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @else
                            <a href="{{'/adm/sections/edit?id=' . $data['sectionId']}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @endif
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection