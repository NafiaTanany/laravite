@extends('layout.app')
@section('content')
<create-admins inline-template :admin="{{isset($user) ? json_encode($user) : 'null' }}"></create-admins>
@endsection
