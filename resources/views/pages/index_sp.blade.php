@extends('layouts.user.app', ['noContainer' => true])

@section('content')
    <div class="p-index">
        <p class="p-index--copy">失敗しないデート</p>
        <div class="p-index__search-form">
          <div class="col-md-12 mt-3 mb-5">
            <div class=" mx-auto">
              <search-restaurants-sp
                :price-list="{{ json_encode(FormHelper::suggestpriceList()) }}"
                :search-button-title="'再検索する'" />
            </div>
          </div>
        </div>
    </div>
@endsection
