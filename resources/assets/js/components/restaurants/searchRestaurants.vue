<template>
  <div>
    <div
      style="
      display: flex;
      width: 100%;">
      <div
        class="cp_iptxt"
        @click="openSuggestBar()">
        <input
          v-model="inputWord"
          type="text"
          placeholer="カテゴリ・店名・キーワード"
          @input="onInput">
        <i class="fa-eat" />
      </div>
      <div>
        <button
          type="button"
          class="m-btn"
          @click="searchRestaurants()">
          検索
        </button>
      </div>
    </div>
    <!-- suggest -->
    <div
      v-if="isOpen"
      class="suggest-field-overlay"
      @click="close()">
      <div
        class="suggest-field">
        <div class="category-list list">
          <span>{{ category_title }}</span>
          <ul
            v-for="(category, index) in categories"
            :key="index">
            <li
              class="tag"
              @click="addInputWard(category.name)">
              {{ category.name }}
            </li>
          </ul>
        </div>
        <div class="restaurant-list list">
          <span>{{ restaurant_title }}</span>
          <ul
            v-for="(restaurant, index) in restaurants"
            :key="index">
            <li
              class="tag"
              @click="addInputWard(restaurant.name)">
              {{ restaurant.name }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
  },
  data (){
    return {
      inputWord: '',
      isOpen: false,
      category_name: '',
      category_title: '',
      restaurant_title: '',
      categories: [],
      popularCategories: [],
      popularRestaurants: [],
      restaurants: [],
    }
  },
  created () {
    this.category_title = '人気のカテゴリ'
    this.restaurant_title = '人気のレストラン'
    this.fetchPopularCategories()
    this.fetchPopularRestaurants()
  },
  methods: {
    openSuggestBar (){
      this.isOpen = true
    },
    close (){
      this.isOpen = false
    },
    addInputWard (name) {
      this.inputWord = name
    },
    onInput: function() {
      if (this.inputWord) {
        this.fetchCategories()
        this.fetchRestaurants()
      }

      if (!this.inputWord) {
        this.categories = this.popularCategories
        this.restaurants = this.popularRestaurants
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
      let url = `/q?word=${this.inputWord}`
      window.location.href = url
    }
  }
}
</script>
<style lang="scss" scoped>
.search-field__input {
  vertical-align: middle;
  height: 24px;
  line-height: 24px;
  width: 100%;
}
.list {
  flex: 1 0 0%;
  width: 50%;
}
.suggest-field {
  background: #fff;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);
  padding: 16px;
  // position: absolute;
  width: 100%;
  height: 200px;
  box-sizing: border-box;
  top: 100%;
  right: 1px;
  left: 0;
  border-top: 1px solid #d5d5d8;
  display: flex;
  flex-wrap: wrap;

  &-overlay {
    // display: flex;
    // align-items: center;
    // justify-content: left;
    // position: fixed;
    // background: rgba(0, 0, 0, 0.5);
    z-index: 30;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
}
.tag {
  padding: 8px;
  background-color: #f4f4f5;
  color: #4a4a4b;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  display: inline-block;
  max-width: calc(100% + 8px);
  box-sizing: border-box;
  border: 0;
  border-radius: 2px;
  cursor: pointer;
  font-size: .923em;
  line-height: .923em;
  outline: none;
  text-align: left;
  text-decoration: none;
  vertical-align: middle;
  transition: all .3s ease-out;
}
.category-list {
  padding-right: 8px;
}
.restaurant-list {
  padding-left: 8px;
  border-left: 1px dotted #d5d5d8;
}
.cp_iptxt {
  position: relative;
}
.cp_iptxt input[type='text'] {
  font: 15px/24px sans-serif;
  box-sizing: border-box;
  width: 100%;
  padding: 0.3em;
  padding-left: 40px;
  letter-spacing: 1px;
  border: 0;
}
.cp_iptxt input[type='text']:focus {
  outline: none;
}
.cp_iptxt input[type='text']:focus::after {
  outline: none;
}
.cp_iptxt i {
  position: absolute;
  top: 0;
  left: 0;
  padding: 9px 5px;
  transition: 0.3s;
  color: #aaaaaa;
}
.cp_iptxt::after {
  display: block;
  width: 100%;
  height: 4px;
  margin-top: -1px;
  content: '';
  border-width: 0 1px 1px 1px;
  border-style: solid;
  border-color: #da3c41;
}
</style>