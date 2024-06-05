
<script setup>
import headerpic from './components/header.vue';
</script>

<template>

    <header>
        <headerpic />
    </header>

    <div class="cover">
        <img class="coverpic" src="/public/Assets/img/cover.png" alt="Cover Background" />
    </div>

    <div class="coversecend">
        <img class="coverpictwo" src="/public/Assets/img/coversecend.png" alt="Cover Background" />
    </div>
    
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>

   
    
   
</template>


<style>
@import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');
* {
    max-width: 100vw;
    font-family: "Lexend Deca", sans-serif;
}

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: rgba(128, 117, 82, 1);  
        
    }

    .cover {
        position: absolute;
        top: 0px;
        left: -350px;
        right: 0;
        z-index: -2;            
    }

    .coverpic {
        object-fit: cover;
        top: 450px;
        left: -350px;
    }

    .coverpictwo {
        position: absolute;
        right: 0;
    }

    .coversecend {
        position: absolute;
        top: 1650px;
        left: 748px;
        right: 0;
        z-index: -2;
    }

    @media (max-width: 768px) {

        .coverpictwo {
            display: none;
    }
}
</style>
