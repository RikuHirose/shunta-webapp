@extends('layouts.user.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="mx-auto" style="width: 64%;">
                <search-restaurants></search-restaurants>
            </div>
        </div>
    </div>
@endsection
