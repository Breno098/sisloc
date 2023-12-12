import { defineStore } from 'pinia';

export const useShopingCart = defineStore('shoping_cart', () => {
    const products = ref([]);

    function addProduct(product) {
      products.value.push(product);
    }

    function updateProduct(productId, newData) {
    }

    function removeProduct(productId) {
      let index = products.value.findIndex(product => product.id === productId);

      products.value = [
          ...products.value.slice(0, index),
          ...products.value.slice(index + 1)
      ];
    }

    return { products, addProduct, updateProduct, removeProduct };
  })