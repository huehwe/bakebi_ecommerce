<template>
  <div class="">
    <div class="">
      <div>
        <h2 class="">
          {{ title }}
        </h2>
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
  const {title} = defineProps({
    title: String
  })
</script>

<style scoped>

</style>
