@extends('layouts.app')

@section('title', 'Page not found | '.config('site.name'))
@section('robots')<meta name="robots" content="noindex">@endsection

@section('content')
<section class="wrap prose">
  <h1>Page not found</h1>
  <p class="lead">The page you're looking for isn't here. It may have moved.</p>
  <p><a class="button" href="{{ route('home') }}">Go to the home page</a></p>
</section>
@endsection
