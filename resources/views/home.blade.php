@extends('layouts.user.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            side
        </div>
        <div class="col-md-9">
            {{ $users }}
        </div>
    </div>
@endsection
