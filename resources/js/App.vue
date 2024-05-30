<template>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>


</template>


<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: rgba(128, 117, 82, 1);
    }

</style>
