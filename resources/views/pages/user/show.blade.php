@extends('layouts.user.app')

@section('content')

  <div class="p-user-show">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.show', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show')
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
