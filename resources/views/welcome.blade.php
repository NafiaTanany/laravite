@extends('layout.app')
@section('content')
    <welcome></welcome>
@endsection
@push('scripts')
    @vite('resources/js/pages/welcome.js')
    @endpush
