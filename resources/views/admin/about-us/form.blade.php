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
        <form action="{{route('admin-about-us-save')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{'Редагування секції "Про нас"'}}</h4>
            <input type="hidden" name="id" value="{{$data['about-us']->id}}">
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{ $data['about-us']->title }}">
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
                        <textarea id="example-textarea-ckeditor" name="text" class="ckeditor">{{$data['about-us']->text}}</textarea>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    </div>@endsection