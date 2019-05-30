<div class="c-res-show-detail-info">
  <table class="c-res-show-detail-info__table">
    <tbody>
      <tr>
        <th>
          <span class="fa-eat"></span>
          カテゴリ
        </th>
        <td>{{ $restaurant->category->name }}</td>
      </tr>
      <tr>
        <th>
          <span class="fa-clock"></span>
          営業時間
        </th>
        <td>{{ $restaurant->opening_hours }}</td>
      </tr>
      <tr>
        <th>
          <span class="fa-sleep"></span>
          定休日
        </th>
        <td>{{ $restaurant->regular_holiday }}</td>
      </tr>
      <tr>
        <th>
          <span class="fa-credit-card"></span>
          カード
        </th>
        <td></td>
      </tr>
      <tr>
        <th>
          <span class="fa-yen"></span>
          予算
        </th>
        <td>
          ランチ: ~{{ $restaurant->lunch_price_zone }}円
          ディナー: ~{{ $restaurant->dinner_price_zone }}円
        </td>
      </tr>
      <tr>
        <th>
          <span class="fa-location"></span>
            住所
        </th>
        <td>{{ $restaurant->address }}</td>
      </tr>
      <tr>
        <th>
          <span class="fa-train"></span>
          アクセス
        </th>
        <td>{{ $restaurant->access }}</td>
      </tr>
    </tbody>
  </table>

  <table class="c-res-show-detail-info__table">
    <tbody>
      <tr>
        <th>
          店名
        </th>
        <td>{{ $restaurant->name }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $restaurant->tel }}</td>
      </tr>
      <tr>
        <th>お店のホームページ</th>
        <td>{{ $restaurant->hp_url }}</td>
      </tr>
      <tr>
        <th>SNSのURL</th>
        <td>
          @isset($restaurant->fb_url)
            FacebookのURL: {{ $restaurant->fb_url }}
          @endisset
          @isset($restaurant->tw_url)
            TwitterのURL: {{ $restaurant->tw_url }}
          @endisset
          @isset($restaurant->ig_url)
            InstagramのURL: {{ $restaurant->ig_url }}
          @endisset
        </td>
      </tr>
      <tr>
        <th>座席</th>
        <td>{{ $restaurant->seating_capacity }}席</td>
      </tr>
    </tbody>
  </table>
</div>