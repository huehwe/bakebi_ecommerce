<template>
  <GuestLayout title="Yêu cầu mật khẩu">
    <div class="flex justify-center items-center">
      <div class="mt-48"></div>
      <form class="space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true"/>

        <div class="flex justify-center">
          <input
            id="email-address"
            name="email"
            type="email"
            autocomplete="email"
            required
            class="w-[553px] h-16 rounded-full border border-black px-6 py-2 mx-auto hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-black transition duration-300 ease-in-out font-mulish placeholder:text-stone-900"
            placeholder="Email"
          />
        </div>

        <div class="flex justify-between items-center w-[553px] mx-auto">
          <router-link :to="{ name: 'login' }" class="text-stone-900 hover:text-gray-700 hover:underline font-mulish font-bold">
            Bạn còn nhớ mật khẩu?
          </router-link>

          <button type="submit" class="w-48 h-16 bg-black hover:bg-stone-600 hover:shadow-xl transition duration-300 ease-in-out text-amber-50 rounded-[31.5px] flex justify-center items-center ml-auto font-mulish">
            Tiếp theo
          </button>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>

<script setup>
import { LockClosedIcon } from '@heroicons/vue/solid'
import GuestLayout from "../components/GuestLayout.vue";
</script>
