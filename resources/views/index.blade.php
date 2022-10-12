@extends('layout.app')
@section('content')
    <index></index>
@endsection
@push('scripts')
    @vite('resources/js/pages/index.js')
    @endpush
