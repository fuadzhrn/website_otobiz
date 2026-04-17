@extends('layouts.app')

@section('title', 'Kontak & Support | Otobiz')
@section('seo_description', 'Hubungi Otobiz untuk konsultasi kemitraan mobil, informasi produk, dan dukungan awal bisnis kendaraan secara cepat dan profesional.')
@section('seo_canonical', route('kontak'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - kontak dan support kemitraan kendaraan')

@section('content')
    @include('partials.home.navbar')

    <main class="kontak-page">
        @include('partials.kontak.hero')
        @include('partials.kontak.contact-hub')
        @include('partials.kontak.closing-strip')
    </main>

    @include('partials.home.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/kontak.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('asset/js/kontak.js') }}"></script>
@endpush
