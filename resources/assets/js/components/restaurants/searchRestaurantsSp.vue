
<template>
  <div class="m-search">
    <div class="m-search--wrap">
      <div
        class="m-search__input--wrap"
        @click="switchSuggestBar()">
        <div
          :class="{'m-search__suggest-overlay': isOpenSuggestBar}">
          <!-- SuggestBar -->
          <div
            class="m-search__suggest--wrap">
            <input
              v-model="inputWord"
              class="m-search__suggest--wrap__input"
              type="text"
              placeholder="カテゴリ・店名・キーワード"
              @input="onInput">

            <div
              v-if="isOpenSuggestBar"
              class="m-search__suggest--list">
              <div class="m-search__suggest__category-list">
                <span class="fa-eat">
                  <span class="ml-2">{{ category_title }}</span>
                </span>
                <ul class="mt-2">
                  <li
                    v-for="(category, index) in categories"
                    :key="index"
                    class="m-search__suggest__tag"
                    @click="addInputWord(category.name)">
                    {{ category.name }}
                  </li>
                </ul>
              </div>
              <div class="m-search__suggest__restaurant-list">
                <span class="fa-restaurant">
                  <span class="ml-2">{{ restaurant_title }}</span>
                </span>
                <ul class="mt-2">
                  <li
                    v-for="(restaurant, index) in restaurants"
                    :key="index"
                    class="m-search__suggest__tag"
                    @click="addInputWord(restaurant.name)">
                    {{ restaurant.name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div
          class="m-search__input--wrap">
          <div
            :class="{'m-search__suggest-fullscreen': isOpenObsessedBar}">
            <!-- Obsesed Bar -->
            <div
              class="m-search__suggest--wrap">
              <button
                type="button"
                class="m-btn"
                btn-type="search-obsessed"
                @click="switchObsessedBar()">
                <span class="mr-3">こだわり条件</span>
                <span
                  v-if="isOpenObsessedBar"
                  class="m-btn-close"
                  btn-type="close-button">
                  <span>X</span>
                </span>
              </button>
              <div
                v-if="isOpenObsessedBar"
                class="m-search__suggest--list">
                <p
                  v-if="!isInputed"
                  class="m-search__suggest--caution">
                  カテゴリ・店名・キーワードを選択してください
                </p>
                <table class="w-100">
                  <tr>
                    <th class="fa-yen">
                      予算
                    </th>
                    <td class="budget-type">
                      <div class="budget-type--switch mr-3">
                        <input
                          id="on"
                          v-model="budget_meal_type"
                          type="radio"
                          value="1"
                          :checked="true">
                        <label
                          for="on"
                          class="switch-on">
                          <span class="fa-lunch" />
                        </label>
                        <input
                          id="off"
                          v-model="budget_meal_type"
                          type="radio"
                          value="0">
                        <label
                          for="off"
                          class="switch-off">
                          <span class="fa-dinner" />
                        </label>
                      </div>
                      <div>
                        <label>
                          <select
                            v-model="budget"
                            class="form-control">
                            <option
                              disabled
                              value="">未選択</option>
                            <option
                              v-for="(price, index) in priceList"
                              :key="index"
                              :value="price"> ~ {{ price }}円</option>
                          </select>
                        </label>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          :disabled="!isInputed"
          @click="searchRestaurants()">
          {{ searchButtonTitle }}
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    priceList: {required: true, type: Array},
    parameter: {required: true, type: Object},
    searchButtonTitle: {required: true, type: String},
  },
  data (){
    return {
      inputWord: '',
      isInputed: false,
      isOpenSuggestBar: false,
      isOpenObsessedBar: false,
      category_name: '',
      category_title: '',
      restaurant_title: '',
      categories: [],
      popularCategories: [],
      popularRestaurants: [],
      restaurants: [],
      budget_meal_type: '',
      max_budget: '',
      budget: '',
      opening_hours: ''
    }
  },
  created () {
    this.category_title = '人気のカテゴリ'
    this.restaurant_title = '人気のレストラン'
    if (this.parameter['word']) {
      this.inputWord = this.parameter['word']
      this.isInputed = true
    }
    if (this.parameter['budget']) { this.budget = this.parameter['budget'] }
    if (this.parameter['budget_meal_type']) { this.budget_meal_type = this.parameter['budget_meal_type'] }

    this.fetchPopularCategories()
    this.fetchPopularRestaurants()
  },
  methods: {
    switchSuggestBar (){
      if (this.isOpenSuggestBar === false) {
        this.isOpenSuggestBar = true
      } else {
        this.isOpenSuggestBar = false
      }
    },
    switchObsessedBar (){
      if (this.isOpenObsessedBar === false) {
        this.isOpenObsessedBar = true
      } else {
        this.isOpenObsessedBar = false
      }
    },
    openSuggestBar (){
      this.isOpenSuggestBar = true
    },
    closeSuggestBar (){
      this.isOpenSuggestBar = false
    },
    openObsessedBar (){
      this.isOpenObsessedBar = true
    },
    closeObsessedBar (){
      this.isOpenObsessedBar = false
    },
    addInputWord (name) {
      this.inputWord = name
      this.isInputed = true
    },
    onInput: function() {
      if (this.inputWord) {
        this.fetchCategories()
        this.fetchRestaurants()
        this.isInputed = true
      }

      if (!this.inputWord) {
        this.categories = this.popularCategories
        this.restaurants = this.popularRestaurants
        this.isInputed = false
      }
    },
    fetchPopularCategories () {
      let url = '/api/v1/categories/popular'

      this.$axios.post(url)
        .then((res) => {
          this.popularCategories = res.data.categories
          this.categories = this.popularCategories
        })
        .catch(err => {
          alert(err)
        })
    },
    fetchCategories () {
      let url = '/api/v1/categories/suggest'

      this.$axios.post(url, {
        name: this.inputWord
      })
        .then((res) => {
          this.categories = res.data.categories
          this.category_title = 'カテゴリ'
        })
        .catch(err => {
          alert(err)
        })
    },
    fetchPopularRestaurants () {
      let url = '/api/v1/restaurants/popular'

      this.$axios.post(url)
        .then((res) => {
          this.popularRestaurants = res.data.restaurants
          this.restaurants = this.popularRestaurants
        })
        .catch(()=> {
        })
    },
    fetchRestaurants () {
      let url = '/api/v1/restaurants/suggest'

      this.$axios.post(url, {
        name: this.inputWord
      })
        .then((res) => {
          this.restaurants = res.data.restaurants
          this.restaurant_title = '人気のレストラン'
        })
        .catch(() => {
        })
    },
    searchRestaurants () {
      if (this.inputWord) {
        let url = `/q?word=${this.inputWord}&budget_meal_type=${this.budget_meal_type}&budget=${this.budget}`

        window.location.href = url
      }
    }
  }
}
</script>
<style lang="scss" scoped>
</style>