<div class="row">
  <div class="col-md-6">
    @php
      $white_stars = 5 - $restaurant->admin_evaluate;
    @endphp

    @for ($i = 1; $i <= $restaurant->admin_evaluate; $i++)
      <span class="fa-star-yellow"></span>
    @endfor
    @for ($i = 1; $i <= $white_stars; $i++)
      <span class="fa-star-gray"></span>
    @endfor
  </div>
  <div class="col-md-6">
    <span class="m-tag">
      {{ $restaurant->category->name }}
    </span>
  </div>
</div>
<div class="mt-2 mb-2">
    <span class="fa-location">
      <span>
        {{ $restaurant->nearest_station }}徒歩{{ $restaurant->nearest_station_minutes }}分
      </span>
    </span>
</div>