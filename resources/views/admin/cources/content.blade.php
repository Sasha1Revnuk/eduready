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


<!-- END Navigation info -->

    <!-- Search Results -->
    <div class="page-header page-header-top clearfix">
        <div class="row">
            <h4 class="text-center">Курс {{$data['cource']->title}} <a href="{{'/adm/courses/update?id=' . $data['cource']->id}}" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i></a> <a href="{{'/adm/courses/conf-delete?id=' . $data['cource']->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></h4>
        </div>
        <div class="row form-group">
            <div class="col-md-4">
                <a href="{{'/adm/sections/add?cource=' . $data['cource']->id}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати секцію</a>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-4">
                <div class="dash-tile dash-tile-2x">
                    <div class="dash-tile-header">
                        <i class="fa fa-archive"></i> Секції
                    </div>
                    <div class="dash-tile-content">
                        <div class="dash-tile-content-inner-fluid">
                            <table class="table table-striped" style="background-color: #fff;">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Назва</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['cource']->sections as $section)
                                    <tr>
                                        <td class="text-center">{{$section->id}}</td>
                                        <td class="text-center"><a href="{{'/adm/sections/edit?id=' . $section->id}}">{{$section->title}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dash-tile dash-tile-2x">
                    <div class="dash-tile-header">
                        <i class="fa fa-user"></i> Студенти курсу
                    </div>
                    <div class="dash-tile-content">
                        <div class="dash-tile-content-inner-fluid">
                            <form class="form-horizontal" action="{{'/adm/courses/edit' }}" method="get">
                                <div class="col-md-4 text-center">
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $data['cource']->id }}">
                                        <div class="col-md-12 form-group">
                                            <label>Група:</label>
                                            <select class="form-control" id="example-select" name="group" >
                                                <option value="0">--</option>
                                                @for($i = 0; $i < count($data['groups']); $i++)
                                                    @if(request()->get('group'))
                                                        <option value="{{$data['groups'][$i]->id}}" {{request()->get('group') == $data['groups'][$i]->id ? 'selected' : ''}} >{{ $data['groups'][$i]->title }}</option>
                                                    @else
                                                        <option value="{{$data['groups'][$i]->id}}" >{{$data['groups'][$i]->title}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <button class="btn btn-info"><i class="fa fa-filter"></i> Фільтр</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-striped" style="background-color: #fff;">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Студент</th>
                                    <th class="text-center">Пошта</th>
                                    <th class="text-center">Група</th>
                                    <th class="text-center">Спеціальність</th>
                                    <th class="text-center">Факультет</th>
                                    <th class="text-center">Фото</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['users'] as $user)
                                    <tr>
                                        <td class="text-center">{{$user->id}}</td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        @if($user->group_id != 0)
                                        <td class="text-center">{{\App\Models\Group::find($user->group_id)->title}}</td>
                                        <td class="text-center">{{\App\Models\Group::with('specialisation')->find($user->group_id)->specialisation->title}}</td>
                                        <td class="text-center">{{\App\Models\Group::with('specialisation')->with('specialisation.faculty')->find($user->group_id)->specialisation->faculty->title}}</td>
                                        <td class="text-center"><img src="{{asset('img/users/' . $user->id . '/' . $user->img)}}" width="80" height="80" /></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection