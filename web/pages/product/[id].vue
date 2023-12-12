<script setup>
    import { useShopingCart } from '~/stores/useShopingCart';

    const shopingCart = useShopingCart();

    const { id } = useRoute().params

    const { data: product } = await useApiFetch(`/api/product/${id}`);

    function addToShoppingCart() {
        shopingCart.addProduct(product.value)

        navigateTo('/')
    }
</script>

<template>
    <div>
        <q-card flat>
            <q-img 
                :src="product.image" 
                height="300px"
            />

            <q-card-section>
                <div class="text-h6 text-weight-bolder q-mb-sm">
                    {{ product.name }}
                </div>

                <div class="text-caption text-grey-9">
                    {{ product.description }}
                </div>
            </q-card-section>
        </q-card>

        <q-footer class="transparent text-black">
            <q-card flat>
                <q-card-section class="row justify-between items-center">
                    <div class="text-weight-bolder">
                        R$ {{ product.price }}
                    </div>
                </q-card-section>

                <q-card-actions>
                    <q-btn 
                        @click="addToShoppingCart"
                        color="black"
                        class="fit"
                        no-caps
                    >
                        <q-icon name="add_shopping_cart" size="sm" class="q-mr-sm"/>
                        
                        Adicionar ao carrinho
                    </q-btn>
                </q-card-actions>
            </q-card>

        </q-footer> 
    </div>
</template>