<script setup>
  definePageMeta({
    middleware: ['auth'],
  })

  import { useShopingCart } from '~/stores/useShopingCart';

  const shopingCart = useShopingCart();

  const search = ref('')

  const { data, refresh } = await useApiFetch('/api/product', {
    query: { 
      name: search,
    },
    watch: [
      search
    ]
  });
  
  const countProductsInCart = computed(() => shopingCart.products.length)

  function showShoppingCard() {
    navigateTo(`/my-cart`)
  }

  function showProduct(product) {
    navigateTo(`/product/${product.id}`)
  }


</script>

<template>
  <div>
    <div class="row q-col-gutter-md q-pa-md">
      <div class="col-12">
          <q-input
              outlined
              v-model="search"
              label="Procurar"
              dense
          />
      </div>
      
      <div
        class="col-6 cursor-pointer"
        v-for="product in data.products" 
        :key="product.id"
      >
        <q-card 
          flat
          @click="showProduct(product)"
        >
          <q-img 
            :src="product.image"
            height="200px"
          >
            <div class="absolute-bottom text-center">
              <div class="text-bold text-uppercase">{{ product.name }}</div>
            </div>
          </q-img>
        </q-card>
      </div>
    </div>

    <q-footer class="transparent text-black">
      <q-card flat>
        <q-card-actions>
            <q-btn 
                v-if="countProductsInCart"
                color="black"
                class="fit"
                no-caps
                @click="showShoppingCard"
            >
              <q-badge color="orange" floating>
                {{ countProductsInCart }}
              </q-badge>

                <q-icon name="shopping_cart" size="sm" class="q-mr-sm"/>
                
                Concluir pedido
            </q-btn>
        </q-card-actions>
      </q-card>
    </q-footer> 
  </div>
</template>
