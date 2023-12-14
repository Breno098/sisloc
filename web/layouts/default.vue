<script lang="ts" setup>
  import { useAuthStore } from '~/stores/useAuthStore';

  const auth = useAuthStore();

  async function handleLogout() {
    await auth.logout();
  }

  const userName = computed(() => auth.user ? auth.user.name : null);

  function goToIndexPage() {
    navigateTo(`/`)
  }
</script>

<template>
   <q-layout view="lhh lpR lFf">
    <q-header class="bg-">
      <q-toolbar>
        <q-toolbar-title 
          @click="goToIndexPage"
          class="row items-center" 
        >
          <div class="bg-orange text-black text-weight-bolder q-px-md rounded-borders">
            Tool rental
            <q-icon name="construction" color="black" size="md"/>
          </div>
        </q-toolbar-title>

        {{ userName }}

        <q-btn round dense flat @click="handleLogout">
          <q-icon name="logout" color="black" size="xs"/>
          <q-tooltip>Sair</q-tooltip>
        </q-btn>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <q-page class="layout-container ">
        <slot />
      </q-page>
    </q-page-container>
   </q-layout>
</template>

<style>
  .layout-container {
    max-width: 80%;
    margin: 0 auto;
    padding: 10px 0;
  }

  .thumb-detail {
        border: 1px solid rgb(209, 209, 209); border-radius: 10px;
        width: 120px;
        height: 120px;
    }

    .title {
        font-size: 20px;
    }

    @media only screen and (max-width: 600px) {
        .layout-container {
            max-width: 95%;
        }

        .thumb-detail {
            width: 70px;
            height: 70px;
        }

        .title {
            font-size: 15px;
        }
    }
</style>