@extends('layouts.user.app', ['noContainer' => true])

@section('content')
  <div id="p-index" class="p-index">
    <!-- p-index--image -->
    <div class="p-index__image">
      <p class="p-index--copy">失敗しないデート</p>
      <div class="p-index__search-form">
          <search-restaurants
          :price-list="{{ json_encode(FormHelper::suggestpriceList()) }}"
          :parameter="{}"
          :search-button-title="'検索する'" />
      </div>
    </div>
    <!-- p-index--point -->
    <section class="p-index__point bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-12">
                <div class="text-center">
                    <h2 class="">
                        {{ Config::get('app.name') }}とは
                    </h2>
                </div>
                <p class="text-center h2-desc">デートにピッタリなお店がすぐ見つかるサービスです</p>
                <div class="row mb-3 mt-3">
                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-eat fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ①デートにピッタリなお店がすぐ見つかる
                          </div>
                          <p class="">
                            今までのグルメサイトはお店が多すぎました。{{ Config::get('app.name') }}ではデートにピッタリなお店のみを掲載。さらにシンプルなデザインでサクサクと検索できるので、もうお店選びで迷うことはありません。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-search fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ②専門のスタッフがお店を厳選
                          </div>
                          <p class="">
                            食事や雰囲気、内装、接客など20項目以上の{{ Config::get('app.name') }}独自の選定基準を全て満たしたお店だけを掲載しています。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="">
                            <div class="card-ttl">
                              ③もう迷わない
                            </div>
                            <p class="">
                              今のお仕事も忙しいあなたに合わせて、週1回からチャレンジできる案件多数。まずキャリアが広がる体験をしてみましょう。
                            </p>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </section>

    <!-- p-index--category -->
    <section class="p-index__category">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-12">
                  <div class="text-center mb-5">
                      <h2 class="">
                          オススメのカテゴリ
                      </h2>
                  </div>

                  <div class="p-index__category__images--wrap">
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/italian-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">イタリアン</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/french-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">フレンチ</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/cafe-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">カフェ</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/beer-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">ビアレストラン</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/yakiniku-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">焼肉</p>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
      </div>
    </section>

    <!-- p-index--reco-job -->
    <section class="p-index__reco-job bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-12">
                <div class="text-center mb-5">
                    <h2 class="">
                        オススメのお店
                    </h2>
                </div>
                <div class="row">
                  <swiper :options="swiperOptionIndexRecoCard">
                    @foreach($recommendRestaurants as $restaurant)
                      <swiper-slide>
                        @include('components.user.restaurants.recoCard', ['restaurant' => $restaurant])
                      </swiper-slide>
                    @endforeach
                    <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                    <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
                  </swiper>
                </div>
              </div>
          </div>
      </div>
    </section>

     <!-- p-index--message -->
    <section class="p-index__message">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-12">
                      <div class="text-center p-index__message--wrap">
                        <p class="">見つけよう</p>
                        <a href="#p-index" class="" v-smooth-scroll>
                          <button class="m-btn">いますぐお店を見つける</button>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
    </section>
  </div>
@endsection