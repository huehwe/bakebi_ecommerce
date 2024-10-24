<template>
  <div class="">
    <div class="">
      <div class="">404</div>
      <div class="">
        <h1 class="">Page Not Found</h1>
        <p class="">Please check the url in address bar and try again</p>
        <div>
          <router-link :to="{name: 'app.dashboard'}"
            class="">
            Go back home
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>

<style scoped>

</style>
