<template>
  <div>
    <label class="sr-only">{{ label }}</label>
    <div class="">
      <span v-if="prepend"
            class="">
        {{ prepend }}
      </span>
      <template v-if="type === 'textarea'">
      <textarea :name="name"
                :required="required"
                :value="props.modelValue"
                @input="emit('update:modelValue', $event.target.value)"
                :class="inputClasses"
                :placeholder="label"></textarea>
      </template>
      <template v-else-if="type === 'file'">
        <input :type="type"
               :name="name"
               :required="required"
               :value="props.modelValue"
               @input="emit('change', $event.target.files[0])"
               :class="inputClasses"
               :placeholder="label"/>
      </template>
      <template v-else>
        <input :type="type"
               :name="name"
               :required="required"
               :value="props.modelValue"
               @input="emit('update:modelValue', $event.target.value)"
               :class="inputClasses"
               :placeholder="label"
               step="0.01"/>
      </template>
      <span v-if="append"
            class="">
        {{ append }}
      </span>
    </div>
  </div>
</template>

<script setup>

import {computed} from "vue";

const props = defineProps({
  modelValue: [String, Number, File],
  label: String,
  type: {
    type: String,
    default: 'text'
  },
  name: String,
  required: Boolean,
  prepend: {
    type: String,
    default: ''
  },
  append: {
    type: String,
    default: ''
  }
})

const inputClasses = computed(() => {
  const cls = [
    ``,
  ];

  if (props.append && !props.prepend) {
    cls.push(`rounded-l-md`)
  } else if (props.prepend && !props.append) {
    cls.push(`rounded-r-md`)
  } else if (!props.prepend && !props.append) {
    cls.push('rounded-md')
  }
  return cls.join(' ')
})

const emit = defineEmits(['update:modelValue', 'change'])

</script>

<style scoped>

</style>
