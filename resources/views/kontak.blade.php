@extends('layouts.app')

@section('title', 'OTOBIZ | Kontak & Support')

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
