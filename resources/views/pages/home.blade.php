@extends('layouts.main')

@section('title', 'MÉLORÉ — Learn Music Better')

@section('content')
  <x-landing.styles />

  <div class="soft-bg">
    <x-landing.hero />
    <x-landing.info-slider />
    <x-landing.partners-outline />
    <x-landing.mentors />
    <x-landing.community />
  </div>

  <x-landing.scripts />
@endsection
