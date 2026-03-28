@extends('layouts.app')

@section('title', 'OTOBIZ | Mekanisme Kemitraan Kendaraan')

@section('content')
    @include('partials.home.navbar')

    <main class="mekanisme-page">
        @include('partials.mekanisme.hero')
        @include('partials.mekanisme.business-model')
        @include('partials.mekanisme.flow')
        @include('partials.mekanisme.terms')
        @include('partials.mekanisme.faq')
        @include('partials.mekanisme.cta')
    </main>

    @include('partials.home.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/mekanisme.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('asset/js/mekanisme.js') }}"></script>
@endpush
