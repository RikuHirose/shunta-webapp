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
          @include('components.user.sidebar.users.show')
      </div>
      <!-- content -->
      <div class="col-md-10">
        @isset($message)
          {{ $message }}
        @endisset

        @isset($restaurants)
          {{ $restaurants }}
        @endisset

      </div>
    </div>
  </div>

@endsection
