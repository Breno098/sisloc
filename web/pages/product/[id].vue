<script setup>
    import { useShopingCart } from '~/stores/useShopingCart';

    const shopingCart = useShopingCart();

    const { id } = useRoute().params

    const { data: product } = await useApiFetch(`/api/product/${id}`);

    function addToShoppingCart() {
        shopingCart.addProduct({
            count: count.value,
            period: period.value,
            ...product.value
        })

        navigateTo('/')
    }

    const count = ref(1)

    function decrementcount() {
        count.value--;
    }

    function incrementcount() {
        count.value++;
    }

    const formatMoney = (price) => price.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
    });

    const period = ref('daily')

    const indexImage = ref(0)
    const mainImage = computed(() => product.value.images.length > 0 ? product.value.images[indexImage.value].path : '' )

    const periodString = computed(() => {
        if (period.value === 'daily') {
            return count.value === 1 ? '1 dia' : `${count.value} dias`
        }

        if (period.value === 'weekly') {
            return count.value === 1 ? '1 semana' : `${count.value} semanas`
        }

        if (period.value === 'fortnightly') {
            return count.value === 1 ? '1 quinzena' : `${count.value} quinzenas`
        }

        if (period.value === 'monthly') {
            return count.value === 1 ? '1 mês' : `${count.value} meses`
        }
    })

    const total = computed(() => {
        let total = 0

        if (period.value === 'daily') {
            total = count.value * product.value.daily_price;
        }

        if (period.value === 'weekly') {
            total = count.value * product.value.weekly_price;
        }

        if (period.value === 'fortnightly') {
            total = count.value * product.value.fortnightly_price;
        }

        if (period.value === 'monthly') {
            total = count.value * product.value.monthly_price;
        }

        return formatMoney(total)
    })
</script>

<template>
    <div>
        <q-card flat>
            <q-card-section class="row justify-betwee">
                <div class="text-h4">{{ product.name }}</div>
            </q-card-section>

            <q-card-section >
                <div class="row q-col-gutter-sm">
                    <div class="col-12 col-md-4">
                        <q-img
                            :src="mainImage"
                            height="500px"
                            fit="contain"
                        />
                    </div>

                    <div class="col-md-2 q-gutter-md text-center q-pb-lg">
                        <q-img
                            v-for="image, index in product.images"
                            :src="image.path"
                            @click="indexImage = index"
                            height="120px"
                            width="120px"
                            fit="contain"
                            style="border: 1px solid rgb(209, 209, 209); border-radius: 10px;"
                            class="cursor-pointer"
                        />
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="text-h5"> Descrição </div>
                        <div class=""> {{ product.description }} </div>

                        <q-list class="q-my-lg">
                            <q-item tag="label" v-ripple>
                                <q-item-section avatar>
                                    <q-radio v-model="period" val="daily" />
                                </q-item-section>

                                <q-item-section>
                                    <q-item-label>
                                        Diária: {{ formatMoney(product.daily_price) }}
                                    </q-item-label>
                                </q-item-section>
                            </q-item>

                            <q-item tag="label" v-ripple>
                                <q-item-section avatar>
                                    <q-radio v-model="period" val="weekly" />
                                </q-item-section>

                                <q-item-section>
                                    <q-item-label>
                                        Semanal: {{ formatMoney(product.weekly_price) }}
                                    </q-item-label>
                                </q-item-section>
                            </q-item>

                            <q-item tag="label" v-ripple>
                                <q-item-section avatar>
                                    <q-radio v-model="period" val="fortnightly" />
                                </q-item-section>

                                <q-item-section>
                                    <q-item-label>
                                        Quinzenal: {{ formatMoney(product.fortnightly_price) }}
                                    </q-item-label>
                                </q-item-section>
                            </q-item>

                            <q-item tag="label" v-ripple>
                                <q-item-section avatar>
                                    <q-radio v-model="period" val="monthly" />
                                </q-item-section>

                                <q-item-section>
                                    <q-item-label>
                                        Mensal: {{ formatMoney(product.monthly_price) }}
                                    </q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>

                        <div class="text-center text-grey-5 q-mt-xl">
                            Resumo: Aluguel de {{ product.name }} por {{ periodString }}
                        </div>

                        <div class="text-h6 text-center q-mb-xl">
                            Total: {{ total }}
                        </div>

                        <div class="row q-col-gutter-md">
                            <div class="col-12 col-md-4">
                                <q-btn-group outline class="fit">
                                    <q-btn
                                        icon="remove"
                                        outline
                                        :disabled="count == 1"
                                        padding="5px"
                                        @click="decrementcount"
                                        class="fit"
                                        color="grey-6"
                                    />

                                    <q-btn :label="count" outline size="sm" color="grey-6"/>

                                    <q-btn
                                        icon="add"
                                        outline
                                        padding="5px"
                                        @click="incrementcount"
                                        class="fit"
                                        color="grey-6"
                                    />
                                </q-btn-group>
                            </div>

                            <div class="col-12 col-md-8">
                                <q-btn
                                    @click="addToShoppingCart"
                                    color="orange"
                                    class="fit"
                                    no-caps
                                    icon="add_shopping_cart"
                                    label="Adicionar ao carrinho"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </q-card-section>
        </q-card>
    </div>
</template>