@extends('layouts.app')

@section('title', 'You are offline | '.config('site.name'))
@section('robots')<meta name="robots" content="noindex">@endsection

@section('content')
<section class="wrap prose">
  <h1>You're offline</h1>
  <p class="lead">This page isn't saved on your device yet. Check your connection and try again.</p>
  <p><a class="button" href="{{ route('home') }}">Try again</a></p>
</section>
@endsection
