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
            
            <div class="col-md-6 form-group">
                <a href="{{'/adm/tests/edit?test_id=' . request()->get('test_id')}}" class="btn btn-info"><i class="fa fa-backward"></i> Повернутись назад</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Студент</th>
                <th>Група</th>
                <th>Балл</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['results'] as $result)
                <tr>
                    <td class="text-center">{{$result->id}}</td>
                    <td>{{\App\Models\User::find($result->user_id)->name}}</td>
                    <td>{{\App\Models\User::getTitleGroup($data['groups'], App\Models\User::find($result->user_id)->group_id)}}</td>
                    <td>{{$result->mark}}</td>
                    <td><a href="{{'/adm/tests/result-delete?id=' . $result->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection