@extends('layouts.app')

@section('title', 'Otobiz | Kemitraan Kepemilikan Kendaraan Produktif')
@section('seo_description', 'Otobiz menghadirkan kemitraan kepemilikan kendaraan produktif yang transparan, profesional, dan berorientasi pertumbuhan aset bisnis kendaraan.')
@section('seo_canonical', route('home'))
@section('seo_image', asset('assets/images/logo_otobiz.jpeg'))
@section('seo_image_alt', 'Otobiz - kemitraan kepemilikan kendaraan produktif')

@section('content')
    @include('partials.home.navbar')

    <main class="home-page">
        @include('partials.home.hero')
        @include('partials.home.value')
        @include('partials.home.flow')
        @include('partials.home.trust')
        @include('partials.home.cta')
    </main>

    @include('partials.home.footer')
@endsection
