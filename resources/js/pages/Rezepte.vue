<template>
    <div class="filter-container">
        <h1>Menü und Co Filter</h1>
        <div class="kategorie">
            <h2>Kategorie Filter</h2>
            <div class="filter-box" >
                <button class="filter-bnt" v-for="dish in dishes" :key="dish.id" :id="dish.id" name="dish_id" :value="dish.id" @click="filterByDish(dish.id)">{{ dish.name }}</button> 
            </div>
        </div>
       
        <div class="place3">
            <h2>Neigung Filter</h2>
            <div class="filter-box">
                <button class="filter-bnt" v-for="recipes_group in recipes_groups" :key="recipes_group.id" :id="recipes_group.id" name="recipes_group_id" :value="recipes_group.id" @click="filterByRecipesGroup(recipes_group.id)">{{ recipes_group.name }}</button>
            </div>

            <div class="t-label">
                <label for="herkunft">Filter für die Herkunft des Rezeptes. </label>
                <select v-model="country_id" @change="filterByCountry">
                    <option value="" disabled selected>Land auswählen</option>
                    <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                </select>
            </div>
            
            <div class="allergie-box">
                <div>
                    <p>Der Allergiefilter verhindert, dass Rezepte mit allergenen Inhaltsstoffen angezeigt werden, falls diese vom Autor vermerkt wurde.</p>
                </div>
                <div class="filter-box" >
                
                    <button v-for="allergy in allergies" :key="allergy.id" class="al-box" :id="allergy.id" :name="allergy.id" :value="allergy.id">{{ allergy.name }}</button>
                    
                </div>  
            </div>
        </div>
    </div>

    <div class="r-card">
        <div class="menucard" v-for="(recipe, index) in filteredRecipes" :key="index">
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
                            <button class="ansicht">Rezept Anschauen</button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
import { onUpdated } from 'vue';
import { authClient } from '../services/AuthService';
import axios from 'axios';

export default {
  data() {
    return {
      dishes: [],
      recipes_groups: [],
      countries: [],
      allergies: [],
      recipes: [],
      dish_id: null,
      recipes_group_id: null,
      country_id: null,
      filteredRecipes: [],
    };
  },
  mounted() {
    this.getDishes();
    this.getRecipesGroups();
    this.getCountry();
    this.getAllergies();
    this.fetchRecipes();
  },
  methods: {
    filterByDish(dishId) {
      this.dish_id = dishId;
      this.applyFilters();
    },
    filterByRecipesGroup(recipesGroupId) {
      this.recipes_group_id = recipesGroupId;
      this.applyFilters();
    },
    filterByCountry() {
      this.applyFilters();
    },
    async applyFilters() {
      try {
        const response = await axios.get('/api/recipes', {
          params: {
            dish_id: this.dish_id,
            recipes_group_id: this.recipes_group_id,
            country_id: this.country_id,
          },
        });
        this.filteredRecipes = response.data.data;
        console.log('filteredRecipe:', this.filteredRecipe);
      } catch (error) {
        console.error('Fehler beim Abrufen der gefilterten Rezepte:', error);
      }
    },
    async fetchRecipes() {
      try {
        const response = await authClient.get('/recipes');
        this.recipes = response.data.data;
        console.log('Rezepte:', this.recipes);
        this.filteredRecipes = this.recipes; // Initial alle Rezepte anzeigen
      } catch (error) {
        console.error('Fehler beim Abrufen der Rezepte:', error);
      }
    },
    async getDishes() {
      try {
        const response = await authClient.get('/dishes');
        this.dishes = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getRecipesGroups() {
      try {
        const response = await authClient.get('/recipes/groups');
        this.recipes_groups = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getCountry() {
      try {
        const response = await authClient.get('/countries');
        this.countries = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getAllergies() {
      try {
        const response = await authClient.get('/allergies');
        this.allergies = response.data;
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>


<style scoped>

.filter-container {
    z-index: 9998;
    position: absolute;
    top: 160px;
    left: 50%;
    transform: translateX(-50%); 
}



.filter-bnt{
    width: 126px;
    height: 35px;
    background-color: #b9afaf;
    color: rgb(37, 36, 36);
    font-size: 16px;
    border: none;
    border-radius: 10px;
    margin-right: 10px;
    margin-top: 10px;
}


.r-card {
    z-index: 9998;
    position: absolute;
    top: 700px;
    left: 50%;
    transform: translateX(-50%);
    
}

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

.filter-box {
    display: flex;
    flex-direction: row;
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

.ansicht{
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

@media (max-width: 390px) {
    .menucard {
        width: 100%;
        border-top-left-radius: 150px;
        border-bottom-right-radius: 150px;
    }

    .menu-container {
        display: flex;
        flex-direction: column;
        margin: 50px 0 20px 0;
    }

    .menu-text {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 50px 0 50px 0;
    }

    img {
        border-radius: 25px;
        margin-top: 47px;
        margin-left: 36px;
        margin-bottom: -58px;
        width: 40%;
        height: 40%;


    }

    .titel {
        font-size: 16px;
        font-weight: bold;
        color: #393636;
        margin-top: -115px;
        margin-left: 165px;
    }

    .kategorie {
        font-size: 14px;
        color: #393636;
        margin-left:  165px;
    }

    .herkunft {
        font-size: 14px;
        color: #393636;
        margin-left: 165px;
    }

    .vegi {
        font-size: 14px;
        color: #393636;
        margin-left: 165px;
    }

    .autor {
        font-size: 14px;
        color: #393636;
        margin-top: 20px;
        margin-left: 165px;
    }

    .button {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button {
        width: 120px;
        height: 30px;
        background-color: #393636;
        color: white;
        font-size: 11px;
        border: none;
        border-radius: 10px;
        margin-top: 3px;
        margin-right: 115px;
    }

    .menucard button:hover {
        background-color: #555555;
        color: yellowgreen;
        cursor: pointer;
    }
}


</style>