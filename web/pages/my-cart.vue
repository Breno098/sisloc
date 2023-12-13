<script setup>
  import { useShopingCart } from '~/stores/useShopingCart';
  import { useAuthStore } from '~/stores/useAuthStore';

  const shopingCart = useShopingCart();
  const auth = useAuthStore();

  const authUser = computed(() => auth.user ? auth.user : {});

  const products = computed(() => shopingCart.products)

  const step = ref(1);

  const address = ref({
    cep: null,
    street: null,
    number: null,
    district: null,
    complement: null,
    city: null,
    state: null,
  });

  const personData = ref({
    name: authUser.value.name,
    cellphone: authUser.value.cellphone,
  });

  const paymentMethod = ref(null)
  const paymentMethodComputed =  computed(() => {
    switch (paymentMethod.value) {
      case 'cash': return "Dinheiro";
      case 'credit_card': return "Cartão de crédito/débito";
      default: return null
    }
  })

  const resultData = computed(() => {
    let result = {
      items: [],
      address: { ...address.value },
      paymentMethod: paymentMethod.value
    };

    products.value.forEach(prod => {
      let newProduct = {
        id: prod.product.id,
        quantity: prod.count,
        additional: prod.additional.map(add => ({
          id: add.id,
          quantity: add.count,
        }))
      };

      result.items.push(newProduct);
    });

    return result;
  });


  async function finishOrder() {
    const { data } = await useApiCustomer('/order/store', {
      method: "POST",
      body: resultData.value,
    });
  }

  function removeProduct(product) {
    shopingCart.removeProduct(product.id)
  }

  const formatMoney = (price) => price.toLocaleString('pt-br', {
    style: 'currency', 
    currency: 'BRL'
  });

  const calculateTotalPriceOFProduct = (product) => {
      let total = 0

      if (product.period === 'daily') {
          total = product.count * product.daily_price;
      }

      if (product.period === 'weekly') {
          total = product.count * product.weekly_price;
      }

      if (product.period === 'fortnightly') {
          total = product.count * product.fortnightly_price;
      }

      if (product.period === 'monthly') {
          total = product.count * product.monthly_price;
      }

      return total;
  }

  const totalFormated = product => {
    let total = calculateTotalPriceOFProduct(product);

    return formatMoney(total);
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
</script>

<template>
  <div>
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
            @click="$refs.stepper.next()"
            color="orange"
            no-caps
            label="Fechar pedido"
            icon="check"
        />
      </div>
    </div>
  </div>
</template>
