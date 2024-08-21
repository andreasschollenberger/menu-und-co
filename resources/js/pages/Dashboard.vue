<script setup>
import { ref, onMounted } from 'vue';
import { useAuthStore } from '../stores/AuthStore';
import axios from 'axios';
import { authClient } from '../services/AuthService';

const store = useAuthStore();
const recipes = ref([]);

const fetchRecipes = async () => {

  try {
    const response = await authClient.get('users/auth/recipes');
    console.log('API-Antwort:', response); // Loggen Sie die gesamte Antwort
    const allRecipes = response.data.data;
    recipes.value = allRecipes; // Setzen Sie die Rezepte in den ref
    console.log('Gefilterte Rezepte nach API-Aufruf:', recipes.value); // Loggen Sie die gefilterten Daten
  } catch (error) {
    console.error('Fehler beim Abrufen der Rezepte:', error);
  }
};

onMounted(() => {
  fetchRecipes();
});
</script>

<template>
    <main>
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
        <div class="r-container">
            <div class="i-container">
                <h3>Ihre Profil</h3>
                <p>{{ store.authUser.first_name }}</p>
                <p>{{ store.authUser.last_name }}</p>
                <p>{{ store.authUser.email }}</p>
                <router-link :to="{ name: 'edit-user'}">
                    <img src="/public/Assets/img/edit-button.png" alt="">
                </router-link>
            </div>
            
            <div class="r-card">
                <div class="menucard" v-for="(recipe, index) in recipes" :key="index">
                    <div class="menu-container">
                        <div class="card-img">
                            <img class="menuimg" :src="`/storage/${recipe.image}`" alt="" />
                        </div>
                        <div class="menu-text">
                            <div class="titel">{{ recipe.title }}</div>
                            <div class="kategorie"> Kategorie: {{ recipe.dish_name }}</div>
                            <div class="herkunft">Herkunft: {{ recipe.country_name }}</div>
                            <div class="vegi">Neigung: {{ recipe.recipes_group_name }}</div>
                            
                            <div class="autor">Autor: {{ recipe.user_first_name }}</div>
                            
                            <div class="button">
                                <router-link :to="{ name: 'rezept', params: { id: recipe.id }}">
                                    <button>Rezept Anschauen</button>
                                </router-link>
                                <router-link :to="{ name: 'edit-rezept', params: { id: recipe.id }}">
                                    <button>Rezept Bearbeiten</button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
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
    display: grid;
    grid-template-columns: 1fr 3fr;
}

.i-container {
    background-color: rgba(179, 187, 195, 1);
    margin-left: 10px;
    padding: 20px;
    border-radius: 20px;
}

.i-container img {
    width: 80px;
    height: 80px;
    margin-left: 100px;
}

.create {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 50px;
}

.r-card {
    padding-left: 50px;
}

.menucard {
    width: 100%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px;  
}

.menu-container {
    display: flex;
    margin: 50px 15px 50px 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.menu-text {
    display: flex;
    flex: 1;
    flex-direction: column;
}

.card-img {
    display: flex;
    align-items: center;
    justify-content: center;
}

img {
    flex: 1;
    max-width: 100%;
    border-radius: 50px;
    margin-top: 50px;
    margin-left: -67px;
    margin-bottom: 50px;
}

.titel {
    font-size: 30px;
    font-weight: bold;
    color: #393636;
    margin-top: 20px;
   
}

.kategorie {
    font-size: 20px;
    color: #393636;
}

.herkunft {
    font-size: 20px;
    color: #393636;
}

.vegi {
    font-size: 20px;
    color: #393636;
}

.autor {
    font-size: 20px;
    color: #393636;
    margin-top: 20px;
}

.button {
    display: flex;
}

button {
    width: 164px;
    height: 45px;
    background-color: #393636;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
    margin-right: 10px;
}

.menucard button:hover {
    background-color: #555555;
    color: yellowgreen;
    cursor: pointer;
}
</style>