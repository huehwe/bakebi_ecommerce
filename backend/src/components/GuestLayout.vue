<template>
  <div class="min-h-screen flex justify-center items-center bg-pink-50 px-[294px] py-[31px]">
    <div class="w-full max-w-[1440px]">
      <div class="text-center">
        <h2 class="font-mulish font-bold text-4xl leading-10 text-black">
          {{ title }}
        </h2>
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
  const { title } = defineProps({
    title: String,
  });
</script>

<style scoped>
</style>
