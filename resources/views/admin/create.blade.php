@extends('layout.app')
@section('content')
<create inline-template :admin="{{isset($user) ? json_encode($user) : 'null' }}"></create>

@endsection
@push('scripts')
@vite('resources/js/pages/admins/create.js')
@endpush