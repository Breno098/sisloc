<script setup>
  definePageMeta({
    middleware: ['auth'],
  })

  import { useShopingCart } from '~/stores/useShopingCart';

  const shopingCart = useShopingCart();

  const search = ref('')

  const slide = ref(1);

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
          bordered
          flat
        >
          <q-img 
            :src="product.images[0].path"
            height="200px"
            fit="contain"
          />

          <q-separator  />

          <q-card-section class="row justify-between bg-grey-2">
            <div class="text-h6 text-center">{{ product.name }}</div>
            <div class="text-h5 text-green text-center">R$ {{ product.price }}</div>
          </q-card-section>

          <q-separator inset />

          <q-card-section>
            <div class="text-center">
              {{ product.description }}
            </div>
          </q-card-section>

          <q-card-actions>
            <q-btn 
              color="orange"
              @click="showProduct(product)"
              no-caps
              class="fit"
            > 
              Ver detalhes 
            </q-btn>
          </q-card-actions>
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
