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
        @if($value = \Illuminate\Support\Facades\Session::pull('advantageDelete'))
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
                    <a href="{{'/adm/advantages/add'}}" class="btn btn-success"><i class="fa fa-plus"></i> Додати перевагу</a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Назва</th>

            </tr>
            </thead>
            <tbody>
            @if(count($data['advantages']) > 0)
                @foreach($data['advantages'] as $advantage)
                    <tr>
                        <td class="text-center">{{$advantage->id}}</td>
                        <td><a href="{{'/adm/advantages/edit?id=' . $advantage->id}}">{{$advantage->title}}</a></td>
                        <td><a href="{{'/adm/advantages/delete?id=' . $advantage->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection