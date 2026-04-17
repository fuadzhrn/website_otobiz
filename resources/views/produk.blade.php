@extends('layouts.app')

@section('title', 'Produk | Otobiz')
@section('seo_description', 'Temukan paket produk Otobiz untuk kemitraan mobil dan kendaraan produktif yang disusun untuk kebutuhan bisnis yang lebih terukur.')
@section('seo_canonical', route('produk'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - produk kemitraan kendaraan produktif')

@section('content')
    @include('partials.home.navbar')

    <main class="produk-page">
        @include('partials.produk.hero')
        @include('partials.produk.packages')
        @include('partials.produk.units')
        @include('partials.produk.specs-gallery')
        @include('partials.produk.simulation')
        @include('partials.produk.cta')
    </main>

    @include('partials.home.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/produk.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('asset/js/produk.js') }}"></script>
@endpush
