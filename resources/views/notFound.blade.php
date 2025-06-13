@extends('layouts.website.layout-website')

@section('content')

<div class="not-found-body">
    <div class="not-found-container">
        <h1 class="not-found-title">404</h1>
        <p class="not-found-message">Page Not Found</p>
        <a href="{{ route('home-page') }}" class="not-found-link">Go to Home</a>
    </div>
</div>


@endsection