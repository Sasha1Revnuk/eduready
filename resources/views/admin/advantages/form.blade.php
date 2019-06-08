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
        <form action="{{route('admin-advantage-save')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['advantage']) ? 'Редагування переваги ' . $data['advantage']->title : 'Додати перевагу'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            @if(isset($data['advantage']))
                <input type="hidden" name="id" value="{{$data['advantage']->id}}">
            @endif
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва переваги</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['advantage']) ? $data['advantage']->title  : ''}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="example-textarea">Опис</label>
                    <div class="col-md-3">
                        <textarea id="example-textarea" name="text" class="form-control" rows="3">{{isset($data['advantage']) ? $data['advantage']->text  : ''}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="example-select">Ярлик</label>
                    <div class="col-md-3">
                        <select id="example-select" name="flatIcon" class="form-control">
                            @foreach($data['flatIcons'] as $title => $value)
                                @if(isset($data['advantage']))
                                    <option value="{{$value}}" {{$data['advantage']->icon == $value ? 'selected' : ''}}>{{$title}}</option>
                                @else
                                    <option value="{{$value}}">{{$title}}</option>
                                @endif
                            @endforeach
                        </select>
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