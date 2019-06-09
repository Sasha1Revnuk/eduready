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
        <form action="{{route('testsSave')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['test']) ? 'Редагування тесту ' . $data['test']->title : 'Додати тест'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            @if(isset($data['test']))
                <input type="hidden" name="id" value="{{$data['test']->id}}">
            @endif
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Назва тесту</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['test']) ? $data['test']->title  : ''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Курс</label>
                    <div class="col-md-3">
                        <select class="form-control" id="example-select" name="cource" >
                            @foreach($data['cources'] as $cource)
                                @if(isset($data['test']))
                                    <option value="{{$cource->id}}" {{$data['test']->cource_id == $cource->id ? 'selected' : ''}}>{{$cource->title}}</option>
                                @else
                                    <option value="{{$cource->id}}">{{$cource->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @if(isset($data['test']))
                    <div class="form-group">
                        <label class="control-label col-md-2">Switches</label>
                        <div class="col-md-10">
                            <label class="switch switch-info"><input type="checkbox" name="active" {{$data['test']->active == 1 ? 'checked' : ''}}><span></span></label>
                            <span class="help-block">Включити/Виключити</span>
                        </div>
                    </div>
                @endif
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                            <a href="{{route('tests')}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @if(isset($data['test']))
                            <a href="{{'/adm/tests/add-question?test_id=' . $data['test']->id}}" class="btn btn-warning"><i class="fa fa-question"></i> Додати питання</a>
                        @endif
                        <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                        <a href="{{'/adm/tests/view?test_id=' . $data['test']->id}}" class="btn btn-default"><i class="fa fa-forward"></i> Подивитись результати</a>

                    </div>
                </div>
            </div>
        </form>
            @if(isset($data['test']))
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Назва питання</th>
                    <th>Видалити</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['test']->questions as $question)
                    <tr>
                        <td class="text-center">{{$question->id}}</td>
                        <td><a href="{{'/adm/tests/edit-question?id=' . $question->id . '&test_id=' . $data['test']->id}}">{{$question->title}}</a></td>
                        <td><a href="{{'/adm/tests/delete-question?id=' . $question->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @endif
    </div>
@endsection