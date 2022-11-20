@extends('layout.app')
@section('content')
    <index-admin></index-admin>
@endsection
@push('scripts')
    @vite('resources/js/pages/admins/index.js')
    @endpush
