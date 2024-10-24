<template>
  <div class="">
    <h1 class="">Products</h1>
    <button type="button"
            @click="showAddNewModal()"
            class=""
    >
      Add new Product
    </button>
  </div>
  <ProductsTable @clickEdit="editProduct"/>
  <ProductModal v-model="showProductModal" :product="productModel" @close="onModalClose"/>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../store";
import ProductModal from "./ProductModal.vue";
import ProductsTable from "./ProductsTable.vue";

const DEFAULT_PRODUCT = {
  id: '',
  title: '',
  description: '',
  image: '',
  price: ''
}

const products = computed(() => store.state.products);

const productModel = ref({...DEFAULT_PRODUCT})
const showProductModal = ref(false);

function showAddNewModal() {
  showProductModal.value = true
}

function editProduct(p) {
  store.dispatch('getProduct', p.id)
    .then(({data}) => {
      productModel.value = data
      showAddNewModal();
    })
}

function onModalClose() {
  productModel.value = {...DEFAULT_PRODUCT}
}
</script>

<style scoped>

</style>
