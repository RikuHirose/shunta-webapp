@extends('layouts.user.app')

@section('content')

  <div class="p-user-edit">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.edit', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show')
      <!-- content -->
      <div class="col-md-10">
          <form action="{{ route('mypage.update') }}" method="POST">
            @csrf
            <div class="m-frmTextbox">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="{{ $currentUser->name }}" required>
            </div>
            <div class="m-frmTextbox">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" value="{{ $currentUser->email }}" required>
            </div>


            <button type="submit" class="m-btn" btn-type="primary">Submit</button>
          </form>
      </div>
    </div>
  </div>

@endsection
