@extends('layouts.app')

@section('title', 'OTOBIZ | Gabung Mitra')

@section('content')
    @include('partials.home.navbar')

    <main class="gabung-page">
        @include('partials.gabung.hero')
        @include('partials.gabung.registration-form')
        @include('partials.gabung.selection-process')
        @include('partials.gabung.sales-contact')
        @include('partials.gabung.cta')
    </main>

    @include('partials.home.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/gabung.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('asset/js/gabung.js') }}"></script>
@endpush
