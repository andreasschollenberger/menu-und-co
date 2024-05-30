
<template>
    
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>

    <div class="cover">
        <img class="coverpic" src="/public/Assets/img/cover.png" alt="Cover Background" />
    </div>

    <div class="coversecend">
        <img class="coverpictwo" src="/public/Assets/img/coversecend.png" alt="Cover Background" />
    </div>
    
    <div class="semicontainer">
        <div class="semitransparent"></div>
    </div>



</template>


<style>
* {
    max-width: 100vw;
}

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: rgba(128, 117, 82, 1);
        
        
    }

    .cover {
        position: absolute;
        top: 450px;
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

    .semicontainer {
        padding-left: 100px;
        padding-right: 100px;
    }

    .semitransparent {
        position: absolute;
        width: 90%;

        top: 230px;
        left: 100px;
        bottom: 0px;
        border-radius: 30px;
        background-color: rgba(222, 220, 220, 0.81);
        z-index: -1;
    }
</style>
