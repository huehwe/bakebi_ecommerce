<template>
  <GuestLayout title="Set new password">
    <form class="" action="#" method="POST">
      <input type="hidden" name="remember" value="true"/>
      <div class="">
        <div>
          <label for="new-password" class="sr-only">New Password</label>
          <input id="new-password" name="password" type="password" required=""
                 class=""
                 placeholder="New Password"/>
        </div>
        <div>
          <label for="password-repeat" class="sr-only">Repeat Password</label>
          <input id="password-repeat" name="password_repeat" type="password" required=""
                 class=""
                 placeholder="Repeat Password"/>
        </div>
      </div>

      <div class="">
        <div class="">
          <router-link :to="{name: 'login'}" class="font-medium text-indigo-600 hover:text-indigo-500">
            Go back to Login
          </router-link>
        </div>
      </div>

      <div>
        <button type="submit"
                class="">
            <span class="">
              <LockClosedIcon class="" aria-hidden="true"/>
            </span>
          Submit
        </button>
      </div>
    </form>
  </GuestLayout>
</template>

<script setup>
import {LockClosedIcon} from '@heroicons/vue/solid'
import GuestLayout from "../components/GuestLayout.vue";
</script>
