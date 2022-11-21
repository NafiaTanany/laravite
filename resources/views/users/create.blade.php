@extends('layout.app')
@section('content')
    <create-users   inline-template  :user="{{isset($user) ? json_encode($user) : 'null' }}"></create-users>
@endsection
