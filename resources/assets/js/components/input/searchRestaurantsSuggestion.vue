<template>
  <div class="">
    <div class="">
      <div class="">
        <button
          type="button"
          class="m-btn"
          btn-type="primary"
          @click="isOpen=!isOpen">
          <span>カテゴリ・店名・キーワード</span>
        </button>
      </div>
    </div>
    <div
      class="suggest-field"
      :class="{active:isOpen}">
      s
    </div>
  </div>
</template>
<script>
export default {
  props: {
  },
  data (){
    return {
      isOpen: false
    }
  },
  created () {
  },

  methods: {
    
  }
}
</script>
<style lang="scss" scoped>
</style>