<script setup>
  import { useAuthStore } from '@/stores/AuthStore';
  import {useRouter} from 'vue-router';

  const router = useRouter();
  const store = useAuthStore();

  const logout = async () => {
      await store.logout().then(() => {
          router.push('/login');
      });
  }
</script>

<template>
    <button class="logout-bnt"
      type="button"
      @click="logout"
    >Logout
    </button>
  </template>

  <style scoped>
    /* .logout-bnt {
        background-color: #f44336;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    } */

    .logout-bnt {
    font-size: 25px;
    width: 200px;
    height: 40px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    margin-top: 20px;
    cursor: pointer;
}

    </style>
  
