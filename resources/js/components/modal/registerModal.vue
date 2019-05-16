<template>
  <div class="m-modal">
    <div class="m-modal__header">
      <p class="m-modal__header__ttl">
        {{ title }}
      </p>
      <button
        class="m-modal__header__close-btn"
        type="button"
        @click="$emit('close')">
        X
      </button>
    </div>
    <div class="m-modal__content">
      <div class="social-content">
        <a
          class="m-btn w-100 mb-3"
          href="/auth/login/facebook"
          btn-type="facebook">
          Facebookで登録する
        </a>
      </div>
      <div class="mail-content">
        <div class="m-frmTextbox">
          <label>お名前</label>
          <input
            v-model="name"
            class="form-control"
            type="text"
            required>
        </div>
        <div class="m-frmTextbox">
          <label>メールアドレス</label>
          <input
            v-model="email"
            class="form-control"
            type="email"
            required>
        </div>
        <div class="m-frmTextbox">
          <label>パスワード</label>
          <input
            v-model="password"
            class="form-control"
            type="password"
            required>
        </div>
        <div class="m-frmTextbox">
          <label>パスワード</label>
          <input
            v-model="password_confirmation"
            type="password"
            class="form-control"
            required>
        </div>
        <div class="m-frmTextbox">
          <button
            class="form-control m-btnS"
            type="submit"
            btn-type="primary"
            @click="postRegister()">
            {{ title }}する
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: {required: true, type: String},
  },
  data (){
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    }
  },
  created () {
  },

  methods: {
    postRegister () {
      this.$axios
        .post('/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        })
        .then(() => {
          window.location.href = '/'
        })
        .catch((err) => {
          alert(err)
        })
    }
  }
}
</script>
<style lang="scss" scoped>

</style>