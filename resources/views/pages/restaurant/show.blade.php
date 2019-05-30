@extends('layouts.user.app')

@section('content')

  <div class="p-res-show">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('restaurants.show', $restaurant) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.restaurants.show')
      <!-- content -->
      <div class="col-md-10 p-res-show--content">
        @include('components.user.restaurants.show.info', ['restaurant' => $restaurant])

        <!-- slideshow -->
        <div class="w-100 p-res-show--slideshow">
          <img src="{{ ImageHelper::getFirstImageForRestaurant($restaurant) }}" class="" style="width: 760px; height: 400px; object-fit: cover;">
        </div>

        <!-- description -->
        <div id="res-description" class="p-res-show--description">
          <h2>{{ $restaurant->description_title }}</h2>
          <p>
            {{ $restaurant->description }}
          </p>
        </div>

        <!-- show detail info -->
        <div id="res-detail-info" class="p-res-show--detail-info">
          <h2>店舗情報</h2>
            @include('components.user.restaurants.show.detailInfo', ['restaurant' => $restaurant])
        </div>

        <!-- google map -->
        <div>
          <gmap
            :restaurant="{{json_encode($restaurant)}}" />
        </div>

      </div>
    </div>
  </div>

@endsection