<template>
  <div class="">
    <router-link :to="{name: 'app.dashboard'}"
                 class="">
      <span class="">
        <HomeIcon class="w-5"/>
      </span>
      <span class="">
        Dashboard
      </span>
    </router-link>
    <router-link :to="{name: 'app.products'}"
                 class="">
      <span class="">
        <ViewListIcon class="w-5"/>
      </span>
      <span class="text-xs">
        Products
      </span>
    </router-link>
    <router-link :to="{name: 'app.dashboard'}"
                 class="">
      <span class="">
        <UsersIcon class="w-5"/>
      </span>
      <span class="">
        Users
      </span>
    </router-link>
    <router-link :to="{name: 'app.dashboard'}"
                 class="">
      <span class="">
        <ChartBarIcon class="w-5"/>
      </span>
      <span class="">
        Reports
      </span>
    </router-link>
  </div>
</template>

<script setup>
  import {HomeIcon, UsersIcon, ViewListIcon, ChartBarIcon} from '@heroicons/vue/outline'
</script>

<style scoped>

</style>
