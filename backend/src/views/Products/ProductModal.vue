<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <TransitionRoot as="template" :show="show">
    <Dialog as="div" class="relative z-10" @close="show = false">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                       leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class=""/>
      </TransitionChild>

      <div class="">
        <div class="">
          <TransitionChild as="template" enter="ease-out duration-300"
                           enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                           enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                           leave-from="opacity-100 translate-y-0 sm:scale-100"
                           leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel
              class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[700px] sm:w-full">
              <Spinner v-if="loading"
                       class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>
              <header class="">
                <DialogTitle as="h3" class="">
                  {{ product.id ? `Update product: "${props.product.title}"` : 'Create new Product' }}
                </DialogTitle>
                <button
                  @click="closeModal()"
                  class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
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
                </button>
              </header>
              <form @submit.prevent="onSubmit">
                <div class="">
                  <CustomInput class="mb-2" v-model="product.title" label="Product Title"/>
                  <CustomInput type="file" class="mb-2" label="Product Image" @change="file => product.image = file"/>
                  <CustomInput type="textarea" class="mb-2" v-model="product.description" label="Description"/>
                  <CustomInput type="number" class="mb-2" v-model="product.price" label="Price" prepend="$"/>
                </div>
                <footer class="">
                  <button type="submit"
                          class="">
                    Submit
                  </button>
                  <button type="button"
                          class=""
                          @click="closeModal" ref="cancelButtonRef">
                    Cancel
                  </button>
                </footer>
              </form>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import {computed, onUpdated, ref} from 'vue'
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import {ExclamationIcon} from '@heroicons/vue/outline'
import CustomInput from "../../components/core/CustomInput.vue";
import store from "../../store/index.js";
import Spinner from "../../components/core/Spinner.vue";

const loading = ref(false)

const props = defineProps({
  modelValue: Boolean,
  product: {
    required: true,
    type: Object,
  }
})

const product = ref({
  id: props.product.id,
  title: props.product.title,
  image: props.product.image,
  description: props.product.description,
  price: props.product.price
})

const emit = defineEmits(['update:modelValue', 'close'])

const show = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

onUpdated(() => {
  product.value = {
    id: props.product.id,
    title: props.product.title,
    image: props.product.image,
    description: props.product.description,
    price: props.product.price
  }
})

function closeModal() {
  show.value = false
  emit('close')
}

function onSubmit() {
  loading.value = true
  if (product.value.id) {
    store.dispatch('updateProduct', product.value)
      .then(response => {
        loading.value = false;
        if (response.status === 200) {
          // TODO show notification
          store.dispatch('getProducts')
          closeModal()
        }
      })
  } else {
    store.dispatch('createProduct', product.value)
      .then(response => {
        loading.value = false;
        if (response.status === 201) {
          // TODO show notification
          store.dispatch('getProducts')
          closeModal()
        }
      })
      .catch(err => {
        loading.value = false;
        debugger;
      })
  }
}
</script>
