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

    @isset($currentUser)
      <favorite-restaurant
          :restaurant="{{json_encode($restaurant)}}"
          :current-user="{{json_encode($currentUser)}}"
          :default-favorited="{{ json_encode(\App\Helpers\Production\FavoriteHelper::defaultFavorited($restaurant, $currentUser)) }}"></favorite-restaurant>
    @endisset

    <div style="">
      @include('components.user.restaurants.info', ['restaurant' => $restaurant])
    </div>

    <div class="c-res-index-card--desc">
      <h3 class="c-res-index-card--desc-ttl">
        {{ $restaurant->description_title }}
      </h3>
      <p class="c-res-index-card--desc-p">
        {{ $restaurant->description }}
      </p>
    </div>

    <div class="text-center">
      <a href="{{ route('restaurants.show', [$restaurant->id]) }}" type="button" class="w-100 m-btn" btn-type="primary">
        詳しく見る
      </a>
    </div>
  </div>

</div>