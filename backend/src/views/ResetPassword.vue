<template>
  <GuestLayout title="Đặt mật khẩu mới">
    <div class="flex justify-center items-center">
      <div class="mt-[350px]"></div>
      <form class="space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true"/>

        <div>
          <label for="new-password" class="sr-only font-mulish">Mật khẩu mới</label>
          <input
            id="new-password"
            name="password"
            type="password"
            required
            class="w-[553px] h-16 rounded-full border border-black px-6 py-2 mx-auto hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-black transition duration-300 ease-in-out font-mulish"
            placeholder="Mật khẩu mới"
          />
        </div>
        <div>
          <label for="password-repeat" class="sr-only font-mulish">Nhập lại mật khẩu</label>
          <input
            id="password-repeat"
            name="password_repeat"
            type="password"
            required
            class="w-[553px] h-16 rounded-full border border-black px-6 py-2 mx-auto hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-black transition duration-300 ease-in-out font-mulish"
            placeholder="Nhập lại mật khẩu"
          />
        </div>

        <div>
          <button type="submit" class="w-[553px] h-16 bg-black hover:bg-stone-600 hover:shadow-xl transition duration-300 ease-in-out text-amber-50 rounded-full flex justify-center items-center mx-auto font-mulish">
            <span class="flex items-center">
              <Send class="w-6 h-6 text-white mr-2" />
              Gửi
            </span>
          </button>
        </div>

        <div class="text-sm text-center">
          <router-link :to="{name: 'login'}" class="text-stone-900 hover:text-gray-700 hover:underline font-mulish">
            Quay lại đăng nhập
          </router-link>
        </div>
      </form>
    </div>
  </GuestLayout>
</template>

<script setup>
import { Send } from 'lucide-vue-next'
import GuestLayout from "../components/GuestLayout.vue";
</script>
