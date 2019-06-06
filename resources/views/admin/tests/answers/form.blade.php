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
        <form action="{{route('answersSave')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['answer']) ? 'Редагування відповідь ' . $data['answer']->title : 'Додати відповідь'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            <input type="hidden" name="question_id" value="{{request()->get('question_id')}}">
            <div class="form-box-content">
                @for($i = 0; $i < 4; $i++)
                    <div class="form-group">
                        <label class="control-label col-md-2" for="example-input-normal">Варіант {{$i+1}}</label>
                        <div class="col-md-3">
                            <input type="text" id="example-input-normal" name="title[]" class="form-control">
                            <div class="checkbox">
                                <label for="example-checkbox1">
                                    <input type="checkbox" id="example-checkbox1" name="right[]" value="{{$i}}"> Правильний варіант {{$i+1}}
                                </label>
                            </div>
                        </div>
                    </div>
                @endfor
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                            <a href="{{'/adm/tests/edit-question?question_id=' . $data['question']->id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                            <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection