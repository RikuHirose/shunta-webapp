<template>
  <div class="">
    <div class="">
      <button
        type="button"
        class="m-btn"
        btn-type="primary"
        @click="isOpen=!isOpen">
        <span>こだわり条件</span>
      </button>
    </div>
    <div
      class="suggest-field"
      :class="{active:isOpen}">
      <table>
        <tr>
          <th>予算</th>
          <td>
            <md-field>
              <md-select
                id="bottomPrice"
                v-model="bottomPrice"
                name="bottomPrice">
                <md-option value="arial">
                  Arial
                </md-option>
                <md-option value="calibri">
                  Calibri
                </md-option>
              </md-select>
            </md-field>
          </td>
        </tr>
        <tr>
          <th>喫煙</th>
          <td>a</td>
        </tr>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  props: {
  },
  data (){
    return {
      isOpen: false,
      bottomPrice: null
    }
  },
  created () {
  },

  methods: {
    
  }
}
</script>
<style lang="scss" scoped>
.suggest-field {
  display: none;
  background: #fff;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);
  padding: 16px;
  position: absolute;
  width: 100%;
  height: 200px;
  top: 100%;
  box-sizing: border-box;
  right: 1px;
  left: 0;
  border-top: 1px solid #d5d5d8;
}
.suggest-field.active {
  display: block;
}
</style>