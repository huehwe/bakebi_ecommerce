<template>
  <GuestLayout title="Đăng nhập">
    <div class="flex justify-center items-center">
      <div class="mt-96"></div>
      <form class="space-y-6" method="POST" @submit.prevent="login">
        <div v-if="errorMsg" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
          {{ errorMsg }}
          <span
            @click="errorMsg = ''"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
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

        <div>
          <label for="email-address" class="sr-only">Email</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required v-model="user.email"
                 class="w-[553px] h-16 rounded-[31.5px] border border-black px-6 py-2 mx-auto"
                 placeholder="Email"/>
        </div>

        <div>
          <label for="password" class="sr-only">Mật khẩu</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required v-model="user.password"
                 class="w-[553px] h-16 rounded-[31.5px] border border-black px-6 py-2 mx-auto"
                 placeholder="Mật khẩu"/>
        </div>

        <div class="flex items-center mx-auto">
          <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember" class="h-6 w-6 border-gray-300 rounded ml-8"/>
          <label for="remember-me" class="ml-2 block text-sm text-gray-900" > Lưu thông tin </label>
        </div>

        <div>
          <button type="submit" :disabled="loading"
                  class="w-[553px] h-16 bg-black text-white rounded-[31.5px] flex justify-center items-center mx-auto">
            <div v-if="loading" class="flex space-x-2">
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce [animation-delay:-0.3s]"></div>
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce [animation-delay:-0.15s]"></div>
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce"></div>
            </div>
            <span v-if="!loading" class="flex items-center">
              <font-awesome-icon icon="user" class="h-5 w-5 mr-2" aria-hidden="true"/>
              Đăng nhập
            </span>
          </button>
        </div>

        <div class="text-sm text-center mt-4">
          <router-link :to="{name: 'requestPassword'}" class="text-black hover:text-gray-700"> Quên mật khẩu? </router-link>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>

<script setup>
import { ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import GuestLayout from "../components/GuestLayout.vue"
import store from "../store"
import router from "../router"

let loading = ref(false)
let errorMsg = ref("")

const user = {
  email: '',
  password: '',
  remember: false
}

function login() {
  loading.value = true
  store.dispatch('login', user)
    .then(() => {
      loading.value = false
      router.push({name: 'app.dashboard'})
    })
    .catch(({response}) => {
      loading.value = false
      errorMsg.value = response.data.message
    })
}
</script>
