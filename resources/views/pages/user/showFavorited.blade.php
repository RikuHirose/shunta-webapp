@extends('layouts.user.app')

@section('content')

  <div class="p-user-show-favorite">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.favorited', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show')
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
