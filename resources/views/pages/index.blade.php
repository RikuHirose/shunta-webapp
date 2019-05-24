@extends('layouts.user.app', ['noContainer' => true])

@section('content')
    <div class="p-index">
        <p class="p-index--copy">失敗しないデート</p>
        <div class="p-index__search-form">
            <search-restaurants
            :price-list="{{ json_encode(FormHelper::suggestpriceList()) }}"
            :search-button-title="'検索する'" />
        </div>
    </div>
@endsection
