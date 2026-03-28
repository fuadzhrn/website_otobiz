@extends('layouts.app')

@section('title', 'OTOBIZ | Kemitraan Kepemilikan Kendaraan')

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
