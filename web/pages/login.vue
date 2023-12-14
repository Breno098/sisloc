<script lang="ts" setup>
  definePageMeta({
    middleware: ['guest'],
    layout: 'guest'
  })

  import { useAuthStore } from '~/stores/useAuthStore';

  const form = ref({
    email: 'fredx@sisloc.com.br',
    password: '123Fred'
  });

  const auth = useAuthStore();

  async function handleLogin() {
    const { error } = await auth.login(form.value)

    if(! error.value) {
      return navigateTo("/");
    }
  }
</script>

<template>
  <div>
    <q-card flat class="q-pa-md">
      <q-card-section class="text-center">
        <div class="text-h4 bg-orange text-black text-weight-bolder q-pa-md rounded-borders">
          Tool rental
          <q-icon name="construction" color="black" size="lg"/>
        </div>
      </q-card-section>

      <q-card-section class="text-center">
        Entrar
      </q-card-section>

      <q-card-section class="row q-col-gutter-sm">
          <div class="col-12">
              <q-input
                  outlined
                  v-model="form.email"
                  type="email"
                  label="E-mail"
              />
          </div>

          <div class="col-12">
              <q-input
                  outlined
                  v-model="form.password"
                  type="password"
                  label="Senha"
              />
          </div>
      </q-card-section>

      <q-card-actions class="q-gutter-sm">
          <q-btn
              color="orange"
              label="Entrar"
              @click="handleLogin"
              class="full-width"
              icon="login"
          />
      </q-card-actions>
      
    </q-card>
  </div>
</template>