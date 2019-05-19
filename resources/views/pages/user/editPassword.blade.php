@extends('layouts.user.app')

@section('content')

  <div class="p-user-edit-password">
    <div class="row mb-2">
      <div class="col-md-6">@include('components.user.breadcrumb')</div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show')
      <!-- content -->
      <div class="col-md-10">
        <form action="{{ route('mypage.update.password') }}" method="POST">
          @csrf
          <div class="m-frmTextbox">
            <label>新しいパスワード</label>
            <input type="password" class="form-control" name="password" value="" required>
          </div>
          <div class="m-frmTextbox">
            <label>もう一度入力</label>
            <input type="password" class="form-control" name="password_confirmation" value="" required>
          </div>


          <button type="submit" class="m-btn" btn-type="primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection