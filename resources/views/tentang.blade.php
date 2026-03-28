@extends('layouts.app')

@section('title', 'OTOBIZ | Tentang Kami - Kemitraan Kepemilikan Kendaraan')

@section('content')
    @include('partials.home.navbar')

    <main class="tentang-page">
        @include('partials.tentang.about-intro')
        @include('partials.tentang.vision-mission')
        @include('partials.tentang.business-values')
    </main>

    @include('partials.home.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tentang.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/tentang.js') }}"></script>
@endpush
