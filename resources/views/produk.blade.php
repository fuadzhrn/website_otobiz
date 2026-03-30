@extends('layouts.app')

@section('title', 'OTOBIZ | Produk Kemitraan Kendaraan')

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
