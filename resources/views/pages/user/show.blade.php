@extends('layouts.user.app')

@section('content')

  <div class="p-res-index">
    <div class="row mb-2">
      <div class="col-md-6">@include('components.user.breadcrumb')</div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      <div class="col-md-2">
          @include('components.user.sidebar.restaurants.index')
      </div>
      <!-- content -->
      <div class="col-md-10">
          {{ $currentUser }}
        <a href="{{ route('mypage.edit') }}" type="button" class="w-100 m-btn" btn-type="primary">
          修正する
        </a>
      </div>
    </div>
  </div>

@endsection
