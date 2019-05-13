@extends('layouts.user.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            @include('components.user.restaurants.searchForm')
        </div>
    </div>
@endsection
