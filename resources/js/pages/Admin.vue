<script setup>



</script>

<template>
    <main>
        <div class="card">
            <div class="menucard">
                <div class="m-img">
                    <div class="img-back">
                        <img src="/public/Assets/img/veganer-burger.png" alt="">
                    </div>
                </div>

                <div class="container">
                    <div class="tag-container" v-if="recipe">
                        <div class="titel">{{ recipe.title }}</div>
                        <div class="kategorie">Kategorie: {{ recipe.dish_name }}</div>
                        <div class="herkunft">Herkunft: {{ recipe.country_name }}</div>
                        <div class="vegi">Neigung: {{ recipe.recipes_group_name }}</div>
                        <div class="autor">Autor: {{ recipe.user_first_name }}</div>
                    </div>

                    <div class="n-container">
                        <div class="nährwert" v-if="recipe">
                            <h3>Vitamingehalt</h3>
                            <ul>
                                <li v-for="vitamin in vitamins">{{ vitamin }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>

            <div class="z-container" v-if="recipe">
                    <h3>Zutaten:</h3>
                    <div v-for="ingrediens in ingrediens">{{ ingrediens }}</div>
                   
                </div>

            <div class="zubereitung" v-if="recipe">
                <h3>Zubereitung:</h3>
                <ol>
                    <li v-for="instruction in instruction">{{ instruction }}</li>
                </ol>
            </div>

            <div class="a-container" v-if="recipe">
                <h3> Allergiker Informationen</h3>
                <div>Rezepte enthalten Allergene, die wir bei der Erstellung so gut wie möglich für Sie hier abbilden.</div><br>
                <ol>
                    <li v-for="allergies in allergies">{{ allergies }}</li>
                </ol>
            </div>

            <button @click="deleteRecipe">Rezept löschen</button>
            <button @click="editRecipe">Rezept bearbeiten</button>
            <button @click="releaseRecipe">Recept Freigeben</button>  

        </div>

    </main>
</template>

<script>

import axios from 'axios';

export default {
  data() {
    return {
      recipe: null, // Initialisiert als null und wird durch `fetchRecipe` gesetzt
      id: this.$route.params.id,
    };
},
  beforeMount() {
    this.fetchRecipe();
  },
  methods: {
    fetchRecipe() {
      console.log('fetchRecipe wird aufgerufen');
      axios.get(`/api/recipes/${this.id}`)
        .then(() => {
          this.recipe = response.data.data;
          console.log('Rezepte nach API-Aufruf:', this.recipe); // Loggen Sie die Daten nach dem Setzen
        })
        .catch(error => {
          console.error('Fehler beim Abrufen der Rezepte:', error);
        });
    },

    deleteRecipe() {
        // Logik zum Löschen eines Rezepts
        axios.delete(`/api/recipes/${this.id}`)
        .then(response => {
            console.log("Rezept gelöscht");
        })
        .catch(error => {
            console.error('Fehler beim Löschen des Rezepts:', error);
        });
    },

    editRecipe() {
        // Logik zum Bearbeiten eines Rezepts
        axios.put(`/api/recipes/${this.id}`, this.recipe)
            .then(response => {
                console.log("Rezept bearbeitet");
            })
            .catch(error => {
                console.error('Fehler beim Bearbeiten des Rezepts:', error);
            });
    },

    releaseRecipe() {
      // Logik zum Freigeben eines Rezepts
      console.log("Rezept freigegeben");
    },
  },

  mounted() {
    // Da `fetchRecipe` bereits in `beforeMount` aufgerufen wird, könnte dieser Teil entfernt oder für andere Initialisierungen genutzt werden
  },
};

</script>

<style scoped>
  /* Halb-transparenter hintergrund */
main {
    display: flex;
    justify-content: center;
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
    padding: 70px 50px 70px 50px;
}


/* grauer container */
.card {
    width: 90%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px; 
    padding-top: 50px;
    padding-left: 20px; 
}

/* img, titel und kategoriene */
.menucard {
    display: flex;
    margin-top: 50px;
    margin-left: 50px;
    margin-right: 200px;
}

.m-img {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 50px 0 27px;
}

.img-back {
    width: 700px;
    height: 600px;
    border-radius: 25px;
    background-color: rgb(95, 68, 10);
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    display: flex;
    flex-direction: column;
}

.img-back img {
    width: 500px;
    height: 400px;
    aspect-ratio: 16/9;
    object-fit: cover;
    margin: 0 0 0 27px;
    border-radius: 25px;
}

.tag-contaner {
    display: flex;
    flex-direction: column;
}


.n-container {
    display: flex;
    flex-direction: column;
}

.nährwert h3 {
    font-size: 16px;
}  

.nährwert li {
    font-size: 15px;
}

.titel {
    font-size: 45px;
    margin-bottom: 15px;
}

.kategorie,
.herkunft,
.vegi,
.autor {
    font-size: 24px;
}

.z-container {
    margin: 50px 0px 0px 100px;
}

.z-container h3 {
    font-size: 36px;
}

.z-container div {
    font-size: 27px;  
}

.zubereitung {
    margin: 50px 0px 0px 100px;
    width: 80%;
    display: flex;
    flex-direction: column;
}

.zubereitung h3 {
    font-size: 36px;
}

.zubereitung li {
    font-size: 27px;
} 

.a-container {
    margin: 50px 0px 0px 100px;
    width: 80%;
    padding-bottom: 80px;
}

button {
    font-size: 25px;
    width: 100;
    height: 40px;
    border-radius: 5px;
    background: rgb(3,209,242);
    background: linear-gradient(0deg, rgba(3,209,242,1) 0%, rgba(26,27,241,1) 62%);
    color: white;
    margin-top: 20px;
    margin-right: 20px;
}

</style>