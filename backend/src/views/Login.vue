<template>
  <GuestLayout title="Sign in to your account">
    <form class="" method="POST" @submit.prevent="login">
      <div v-if="errorMsg" class="">
        {{ errorMsg }}
        <span
          @click="errorMsg = ''"
          class=""
        >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </span>
      </div>
      <input type="hidden" name="remember" value="true"/>
      <div class="">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required="" v-model="user.email"
                 class=""
                 placeholder="Email address"/>
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required=""
                 v-model="user.password"
                 class=""
                 placeholder="Password"/>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember"
                 class=""/>
          <label for="remember-me" class=""> Remember me </label>
        </div>

        <div class="text-sm">
          <router-link :to="{name: 'requestPassword'}" class=""> Forgot
            your password?
          </router-link>
        </div>
      </div>

      <div>
        <button type="submit"
                :disabled="loading"
                class=""
                :class="{
                  '': loading,
                  '': loading,
                }">
          <svg
            v-if="loading"
            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
          >
            <circle
              class="opacity-25"
              cx="12"
              cy="12"
              r="10"
              stroke="currentColor"
              stroke-width="4"
            ></circle>
            <path
              class="opacity-75"
              fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
          </svg>
          <span class="">
              <LockClosedIcon class="" aria-hidden="true"/>
            </span>
          Sign in
        </button>
      </div>
    </form>
  </GuestLayout>
</template>

<script setup>
import {ref} from 'vue'
import {LockClosedIcon} from '@heroicons/vue/solid'
import GuestLayout from "../components/GuestLayout.vue";
import store from "../store";
import router from "../router";

let loading = ref(false);
let errorMsg = ref("");

const user = {
  email: '',
  password: '',
  remember: false
}

function login() {
  loading.value = true;
  store.dispatch('login', user)
    .then(() => {
      loading.value = false;
      router.push({name: 'app.dashboard'})
    })
    .catch(({response}) => {
      loading.value = false;
      errorMsg.value = response.data.message;
    })
}

</script>
