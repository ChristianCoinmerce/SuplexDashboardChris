<template>
  <form action="#">
    <div>
      <label for="email">Email address</label>
      <input type="text" name="email" id="email">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="text" name="password" id="password">
    </div>
    <div>
      <button type="submit">
        Sign in
      </button>
    </div>
  </form>
</template>

<script>

    // import axios from 'axios'
    import { mapActions } from 'vuex'

    export default {
        name: 'SignIn',
        data(){
            return{
                form:{ email:'', password:'',}
            }
        },
        methods: {
            ...mapActions({signIn: 'signIn'}),
            async submit (){
                await this.signIn(this.form)
                this.$router.replace({name:'home'})
            }
        }
    }
</script>