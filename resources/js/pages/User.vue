<script setup>
import menucard from '../components/dashMenuCard.vue';
</script>

<template>
    <main>
        <div class="r-container">
            <div class="i-container">
                <h3>Ihre Profil</h3>
                <p>Max</p>
                <p>Mustermann</p>
                <p>m@m.com</p>
                <router-link to="/EditUser">
                    <img src="/public/Assets/img/edit-button.png" alt="">
                </router-link>
            </div>

            <div class="create">
                <router-link to="/create-rezept">
                    <img src="/public/Assets/img/rezept-button.png" alt="">
                </router-link>
                <router-link to="/registrierung-firma">
                    <img src="/public/Assets/img/partner-bnd.png" alt="">
                </router-link>
       
                <router-link to="/create-werbung">
                    <img src="/public/Assets/img/werbung_bnd.png" alt="">
                </router-link>
            </div>

            <div class="r-card">
                <menucard />
            </div>

        </div>

    </main>

</template>


<style scoped>
    main {
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
}

.r-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.i-container {
    background-color: rgba(179, 187, 195, 1);
    width: 200px;
    margin-left: 0px;
    padding-left: 20px;
    border-radius: 20px;
}

.i-container img {
    width: 80px;
    height: 80px;
    margin-left: 100px;
}

.r-card {
    padding-left: 50px;
}
</style>