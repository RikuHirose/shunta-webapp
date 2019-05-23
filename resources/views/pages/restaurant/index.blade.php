@extends('layouts.user.app')

@section('content')

  <div class="p-res-index">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('restaurants') }}
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <nav class="float-right p-res-index__nav">
          <a class="pl-2 pr-2" href="">人気順</a>
          <span>|</span>
          <a class="pl-2 pr-2" href="{{ UrlHelper::urlRestaurantsByHighPrice() }}">高い順</a>
          <span>|</span>
          <a class="pl-2 pr-2" href="{{ UrlHelper::urlRestaurantsByLowPrice() }}">安い順</a>
        </nav>
      </div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.restaurants.index')
      <!-- content -->
      <div class="col-md-10">
        @isset($message)
          {{ $message }}
        @endisset

        @each('components.user.restaurants.indexCard', $restaurants, 'restaurant')
      </div>
    </div>
  </div>

@endsection