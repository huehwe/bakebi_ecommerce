<template>
  <GuestLayout title="Request new password">
    <form class="" action="#" method="POST">
      <input type="hidden" name="remember" value="true"/>
      <div class="">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required=""
                 class=""
                 placeholder="Email address"/>
        </div>
      </div>

      <div class="">
        <div class="">
          <router-link :to="{name: 'login'}" class=""> Remember your
            password?
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
