@extends('layouts.app')

@section('title', 'Gabung Mitra | Otobiz')
@section('seo_description', 'Gabung bersama Otobiz dan mulai kemitraan kendaraan produktif dengan proses pendaftaran, konsultasi, dan seleksi yang jelas.')
@section('seo_canonical', route('gabung'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - gabung mitra kendaraan produktif')

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
