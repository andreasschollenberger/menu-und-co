<template>

    <div class="produktcard" v-for="(product, index) in products" :key="index">
        <div class="menu-container">
            <img class="menuimg" src="/public/Assets/img/re-img.png" alt="" />

            <div class="menu-text">
                <div class="titel">{{ products.title }}</div>
                <div class="kategorie"> Kategorie: {{ recipe.dish_name }}</div>
                <div class="herkunft">Herkunft: {{ recipe.country_name }}</div>
                <div class="vegi">Neigung: {{ recipe.recipes_group_name }}</div>
                
                <div class="autor">Autor: {{ recipe.user_first_name }}</div>
                
            </div>
        </div>
    </div> 
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            products: [],
        };
    },
    beforeMount() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
            console.log('fetchProducts wird aufgerufen');
            axios.get('/api/products')
                .then(response => {
                    console.log('API-Antwort:', response); // Loggen Sie die gesamte Antwort
                    this.recipes = response.data.data;
                    console.log('Rezepte nach API-Aufruf:', this.products); // Loggen Sie die Daten nach dem Setzen
                })
                .catch(error => {
                    console.error('Fehler beim Abrufen der Rezepte:', error);
                });
        },
    },
};
</script>



<style scoped>

.produktcard {
    width: 60%;
    margin: 0 auto;
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
