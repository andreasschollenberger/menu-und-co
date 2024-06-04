<script setup>
import rezcard from '../components/menucard.vue'; 
</script>


<template>

    <div class="r-card">
        <rezcard />
    </div>

</template>


<style scoped>

.r-card {
    z-index: 9999;
    position: absolute;
    top: 300px;
    left: 50%;
    transform: translateX(-50%);
}

</style>