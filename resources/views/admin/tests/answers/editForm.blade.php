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
        <form action="{{route('answersUpdate')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{'Редагування відповіді '}}</h4>
            <input type="hidden" name="question_id" value="{{request()->get('question_id')}}">
            <input type="hidden" name="id" value="{{$data['answer']->id}}">
            <div class="form-box-content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="example-input-normal">Відповідь:</label>
                        <div class="col-md-3">
                            <input type="text" id="example-input-normal" name="title" class="form-control" value="{{$data['answer']->title}}">
                            @if($data['countRight'] == 1)
                                @if($data['answer']->right == 0)
                                    <div class="checkbox">
                                        <label for="example-checkbox1">
                                            <input type="checkbox" id="example-checkbox1" name="right" value="{{1}}" {{($data['answer']->right > 0) ? 'checked' : ''}}> Правильний варіант
                                        </label>
                                    </div>
                                @endif
                                @else
                                <div class="checkbox">
                                    <label for="example-checkbox1">
                                        <input type="checkbox" id="example-checkbox1" name="right" value="{{1}}" {{($data['answer']->right > 0) ? 'checked' : ''}}> Правильний варіант
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                            <a href="{{'/adm/tests/edit-question?id=' . $data['question']->id . '&test_id=' . $data['question']->test->id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                            <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection