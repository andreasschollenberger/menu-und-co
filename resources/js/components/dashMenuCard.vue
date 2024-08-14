<template>

    <div class="menucard" v-for="(recipe, index) in recipes" :key="index">
        <div class="menu-container">
            <img class="menuimg" :src="`/storage/${recipe.image}`" alt="" />

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
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            recipes: [],
        };
    },
    beforeMount() {
        this.fetchRecipes();
    },
    methods: {
        fetchRecipes() {
            console.log('fetchRecipes wird aufgerufen');
            axios.get('/api/recipes')
                .then(response => {
                    console.log('API-Antwort:', response); // Loggen Sie die gesamte Antwort
                    this.recipes = response.data.data;
                    console.log('Rezepte nach API-Aufruf:', this.recipes); // Loggen Sie die Daten nach dem Setzen
                })
                .catch(error => {
                    console.error('Fehler beim Abrufen der Rezepte:', error);
                });
        },
    },
};
</script>



<style scoped>

.menucard {
    width: 100%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px;  
}

.menu-container {
    display: flex;
    margin: 50px 0 50px 0;
}

.menu-text {
    display: flex;
    flex-direction: column;
    width: 300px;
    margin: 50px 200px 50px 100px;
    
}

img {
    border-radius: 50px;
    margin-top: 50px;
    margin-left: 100px;
    margin-bottom: 50px;
}

.titel {
    font-size: 35px;
    font-weight: bold;
    color: #393636;
    margin-top: 20px;
   
}

.kategorie {
    font-size: 25px;
    color: #393636;
}

.herkunft {
    font-size: 25px;
    color: #393636;
}

.vegi {
    font-size: 25px;
    color: #393636;
}

.autor {
    font-size: 25px;
    color: #393636;
    margin-top: 20px;
}

.button {
    display: flex;
}

button {
    width: 200px;
    height: 50px;
    background-color: #393636;
    color: white;
    font-size: 20px;
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