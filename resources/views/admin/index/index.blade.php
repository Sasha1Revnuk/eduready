@extends('layouts.admin.pages')
@section('content')
    @if($data['role']->role_id == \App\Models\User::ROLE_ADMIN)
        @include('admin.index.admin')
    @endif
    @if($data['role']->role_id == \App\Models\User::ROLE_TEACHER)
        @include('admin.index.teacher')
    @endif
@endsection