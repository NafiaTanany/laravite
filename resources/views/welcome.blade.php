@extends('layout.app')
@section('content')
    <welcome   inline-template  :user="{{isset($user) ? json_encode($user) : 'null' }}"></welcome>

@endsection
@push('scripts')
    @vite('resources/js/pages/welcome.js')
    @endpush
