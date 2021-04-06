<template>
  <div>
    <form @submit.prevent="login">
        <div>
            <label for="email">Email address</label>
            <input type="text" name="email" v-model="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" v-model="password">
        </div>
        <div>
            <button type="submit">
                Sign in
            </button>
        </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      email: '',
      password: ''
      }
  },

  methods: {
    login () {
      this.$store
        .dispatch('login', {
          email: this.email,
          password: this.password
        })
        .then(() => {
          this.$router.push({ name: 'About' })
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}

</script>
