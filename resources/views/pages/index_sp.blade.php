@extends('layouts.user.app', ['noContainer' => true])

@section('content')

  <div id="p-index" class="p-index p-index-sp">
    <!-- p-index--image -->
    <div class="p-index__image">
      <p class="p-index--copy">失敗しないデート</p>
      <div class="p-index__search-form">
        <div class="col-md-12 mt-3 mb-5">
          <div class="mx-auto">
            <search-restaurants-sp
              :price-list="{{ json_encode(FormHelper::suggestpriceList()) }}"
              :parameter="{}"
              :search-button-title="'再検索する'" />
          </div>
        </div>
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
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="">
                            <div class="">
                                ①デートにピッタリなお店がすぐ見つかる
                            </div>
                            <p class="">
                                営業、マーケティング、人事、広報、ファイナンスなど、ビジネス職を中心に多様な案件があります。
                                できることをそのままスキマ時間でやるのではなく、経験を活かしながらキャリアアップにつながる案件にチャレンジできます。
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="">
                            <div class="">
                                ②専門のスタッフがお店を厳選
                            </div>
                            <p class="">
                              食事や雰囲気、内装、接客など20項目以上の{{ Config::get('app.name') }}独自の選定基準を全て満たしたお店だけを掲載しています。
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="">
                            <div class="">
                              ③週1回・4時間〜/月5万円〜。柔軟な働き方が可能
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
    <!-- <section class="p-index__category">
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
                      <img src="/images/restaurant-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">イタリアン</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/restaurant-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">イタリアン</p>
                      </div>
                    </a>
                    <a href="" class="p-index__category__images--link">
                      <img src="/images/restaurant-bg.jpg">
                      <div class="category__info">
                          <p class="category__name">イタリアン</p>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
      </div>
    </section>
 -->
    <!-- p-index--reco-job -->
    <section class="p-index__reco-job">
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
                        <button class="m-btn">
                          <a href="#p-index" class="" v-smooth-scroll>いますぐお店を見つける</a>
                        </button>
                      </div>
                  </div>
              </div>
          </div>
    </section>
  </div>
@endsection
