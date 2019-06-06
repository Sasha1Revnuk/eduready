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
        <form action="{{route('questionsSave')}}" method="post" class="form-horizontal form-box" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4 class="form-box-header">{{isset($data['question']) ? 'Редагування питання ' . $data['question']->title : 'Додати питання'}}</h4>
            <input type="hidden" name="action" value="{{$data['action']}}">
            @if(isset($data['question']))
                <input type="hidden" name="id" value="{{$data['question']->id}}">
            @endif
            <input type="hidden" name="test_id" value="{{request()->get('test_id')}}">
            <div class="form-box-content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-input-normal">Питання</label>
                    <div class="col-md-3">
                        <input type="text" id="example-input-normal" name="title" class="form-control" value="{{isset($data['question']) ? $data['question']->title  : ''}}">
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-10 col-md-offset-2">
                            <a href="{{'/adm/tests/edit?test_id=' . $data['test']->id}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                        @if(isset($data['question']) && count($data['question']->answers) <= 0)
                            <a href="{{'/adm/tests/add-answer?question_id=' . $data['question']->id}}" class="btn btn-warning"><i class="fa fa-question"></i> Додати відповідь</a>
                        @endif
                            <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Зберегти</button>
                    </div>
                </div>
            </div>
        </form>

            @if(isset($data['question']) && count($data['question']->answers) > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Відповідь</th>
                        <th>Кількість балів</th>
                        <th>Редагувати</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['question']->answers as $answer)
                        <tr>
                            <td class="text-center">{{$answer->id}}</td>
                            <td>{{$answer->title}}</td>
                            <td>{{$answer->right}}</td>
                            <td><a href="{{'/adm/tests/edit-answer?id=' . $answer->id . '&question_id=' . $data['question']->id}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
    </div>
@endsection