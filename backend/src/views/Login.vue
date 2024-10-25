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
                class="w-[553px] h-16 rounded-full border border-black px-6 py-2 mx-auto hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-black transition duration-300 ease-in-out font-mulish placeholder:text-stone-900"
                placeholder="Email"/>
        </div>

        <div>
          <label for="password" class="sr-only">Mật khẩu</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required v-model="user.password"
                class="w-[553px] h-16 rounded-[31.5px] border border-black px-6 py-2 mx-auto hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-black transition duration-300 ease-in-out font-mulish placeholder:text-stone-900"
                placeholder="Mật khẩu"/>
        </div>

        <div class="flex items-center mx-auto">
          <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember" class="appearance-none h-6 w-6 checked:bg-black accent-black border-gray-300 rounded hover:border-stone-900 transition-colors duration-300 ease-in-out ml-8"/>
          <label for="remember-me" class="ml-2 block text-base text-stone-900 font-mulish"> Lưu thông tin </label>
        </div>
    
        <div>
          <button type="submit" :disabled="loading"
            class="w-[553px] h-16 bg-black hover:bg-stone-600 hover:shadow-xl transition duration-300 ease-in-out text-amber-50 rounded-[31.5px] flex justify-center items-center mx-auto font-mulish">
            <div v-if="loading" class="flex space-x-2">
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce [animation-delay:-0.3s]"></div>
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce [animation-delay:-0.15s]"></div>
              <div class="bg-white rounded-full h-2.5 w-2.5 animate-bounce"></div>
            </div>
            <span v-if="!loading" class="flex items-center font-mulish">
              <User class="w-6 h-6 text-white mr-2" />
              Đăng nhập
            </span>
          </button>
        </div>

        <div class="text-sm text-center mt-4 font-mulish">
          <router-link :to="{name: 'requestPassword'}" class="text-stone-900 hover:text-gray-700 hover:underline"> Quên mật khẩu? </router-link>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>

<script setup>
import { ref } from 'vue'
import { User } from 'lucide-vue-next'
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
      router.push({ name: 'app.dashboard' })
    })
    .catch(({ response }) => {
      loading.value = false
      errorMsg.value = response.data.message
    })
}
</script>

