<div class="row mb-3 c-res-index-card">

  <div class="col-md-7 c-res-index-card--img__wrap">
    <img src="{{ $restaurant->restaurantImages[0]->image->url }}" class="c-res-index-card--img__sizing">
  </div>

  <div class="col-md-5 mt-3 mb-3">
    <div>
        <h2 class="c-res-index-card__ttl">
          <a href="{{ route('restaurants.show', [$restaurant->id]) }}" class="c-res-index-card__ttl--link">{{ $restaurant->name }}</a>
        </h2>
    </div>

    <div style="">
      @include('components.user.restaurants.info_sp', ['restaurant' => $restaurant])
    </div>
    <div class="text-center mt-3">
      <button type="button" btn-type="primary" class="w-100 m-btn">
        <a href="{{ route('restaurants.show', [$restaurant->id]) }}">詳しく見る</a>
      </button>
    </div>
  </div>

</div>
