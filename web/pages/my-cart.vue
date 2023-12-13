<script setup>
  import { useShopingCart } from '~/stores/useShopingCart';

  const shopingCart = useShopingCart();

  const products = computed(() => shopingCart.products)

  async function finishOrder() {
    alert('Finalizando compra')
  }

  function removeProduct(product) {
    shopingCart.removeProduct(product.id)
  }

  const formatMoney = (price) => price.toLocaleString('pt-br', {
    style: 'currency', 
    currency: 'BRL'
  });

  const calculateTotalPriceOFProduct = (product) => {
      if (product.period === 'daily') {
          return product.count * product.daily_price;
      }

      if (product.period === 'weekly') {
          return product.count * product.weekly_price;
      }

      if (product.period === 'fortnightly') {
          return product.count * product.fortnightly_price;
      }

      return product.count * product.monthly_price;
  }

  const totalFormated = product => {
    return formatMoney(calculateTotalPriceOFProduct(product));
  }

  const price = (product) => {
      let price = 0

      if (product.period === 'daily') {
          price = product.daily_price;
      }

      if (product.period === 'weekly') {
          price = product.weekly_price;
      }

      if (product.period === 'fortnightly') {
          price = product.fortnightly_price;
      }

      if (product.period === 'monthly') {
          price = product.monthly_price;
      }

      return formatMoney(price)
  }

  const description = (product) => {
    if (product.period === 'daily') {
      return 'Aluguel diário';
    }

    if (product.period === 'weekly') {
      return 'Aluguel semanal';
    }

    if (product.period === 'fortnightly') {
      return 'Aluguel quinzenal';
    }

    return 'Aluguel mensal';
  }

  const totalOrderPrice = computed(() => {
      let price = products.value.reduce((carryTotal, prod) => {
        return carryTotal + calculateTotalPriceOFProduct(prod);
      }, 0)

      return formatMoney(price)
  })

  function goToProductList() {
    navigateTo(`/`)
  }
</script>

<template>
  <div>
    <div class="q-px-md q-py-md bg-grey-3 text-right">
      <q-btn 
        @click="goToProductList"
        color="black"
        no-caps
        label="Ir para listagem de produtos"
      />
    </div>

    <div class="text-left text-h4 q-my-lg">
        Meu carrinho
    </div>

    <div class="row q-col-gutter-md">
      <div 
        v-for="product in products"
        class="col-12"
      >
        <q-card flat bordered>
          <q-card-section >
            <div class="row q-col-gutter-md">
              <div class="col-5 col-md-2 text-center">
                <q-img
                  :src="product.images[0].path"
                  height="50px"
                  width="50px"
                  fit="contain"
                />
              </div>

              <div class="col-6 col-md-3">
                {{ product.name }}

                <div class="text-grey-5">
                  {{ description(product) }}
                </div>
              </div>

              <div class="col-12 col-md-2 flex flex-center">
                Valor unitário: {{ price(product) }}
              </div>

              <div class="col-12 col-md-2 flex flex-center">
                <q-btn-group outline class="full-width">
                  <q-btn
                      @click="product.count--"
                      :disabled="product.count == 1"
                      icon="remove"
                      outline
                      padding="5px"
                      class="fit"
                      color="grey-6"
                  />

                  <q-btn :label="product.count" outline size="sm" color="grey-6"/>

                  <q-btn
                    @click="product.count++"
                      icon="add"
                      outline
                      padding="5px"
                      class="fit"
                      color="grey-6"
                  />
                </q-btn-group>
              </div>

              <div class="col-12 col-md-2 flex flex-center">
                Total de {{ totalFormated(product) }}
              </div>

              <div class="col-12 col-md-1 flex flex-center">
                <q-btn 
                  color="red"
                  @click="removeProduct(product)"
                  no-caps
                  icon="close"
                  size="sm"
                  round
                />
              </div>
            </div>
          </q-card-section>
        </q-card>
      </div>
    </div>

    <div class="row q-col-gutter-md q-my-md">
      <div class="col-12 text-right text-h5">
        Total	{{ totalOrderPrice }}
      </div>

      <div class="col-12">
        <q-separator inset />
      </div>

      <div class="col-12 text-right">
        <q-btn
            @click="finishOrder"
            color="orange"
            no-caps
            label="Finalizar pedido"
            icon="check"
        />
      </div>
    </div>
  </div>
</template>
