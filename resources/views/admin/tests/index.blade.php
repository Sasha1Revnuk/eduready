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
        @if($value = \Illuminate\Support\Facades\Session::pull('testDelete'))
            <div class="alert alert-success alert-dismissible" style="z-index: 9999">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$value}}
            </div>
    @endif

    <!-- END Navigation info -->

        <!-- Search Results -->
        <div class="page-header page-header-top clearfix">
            <div class="row">
                <h4 class="text-center">{{$data['title']}}</h4>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <a href="{{route('tests')}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
                    <a href="{{'/adm/tests/add' }}" class="btn btn-success"><i class="fa fa-plus"></i> Додати тест</a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Назва</th>
                <th>Курс</th>
                <th>Активний/Не активний</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data['tests'] as $test)
                    <tr>
                        <td class="text-center">{{$test->id}}</td>
                        <td><a href="{{'/adm/tests/edit?id=' . $test->id}}">{{$test->title}}</a></td>
                        <td>{{\App\Models\Course::find($test->cource_id)->title}}</td>
                        <td>{{$test->active == 1 ? 'Активний' : 'Не активний'}}</td>
                        <td><a href="{{'/adm/tests/delete?id=' . $test->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection