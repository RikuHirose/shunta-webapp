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
      <div class="col-md-10">
          <?php var_dump($restaurant); ?>
      </div>
    </div>
  </div>

@endsection
