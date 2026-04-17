@extends('layouts.app')

@section('title', 'Mekanisme Kemitraan | Otobiz')
@section('seo_description', 'Pahami mekanisme kemitraan Otobiz, dari alur kerja hingga syarat utama, agar Anda lebih mudah memulai bisnis kendaraan produktif.')
@section('seo_canonical', route('mekanisme'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - mekanisme kemitraan kendaraan produktif')

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
