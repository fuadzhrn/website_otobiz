@extends('layouts.app')

@section('title', 'Tentang Kami | Otobiz')
@section('seo_description', 'Pelajari siapa Otobiz, visi, dan nilai kemitraan mobil produktif yang kami bangun untuk mendukung bisnis kendaraan yang berkelanjutan.')
@section('seo_canonical', route('tentang'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - tentang kemitraan mobil produktif')

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
