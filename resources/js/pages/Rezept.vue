<template>
    <main>
        <div class="card">
            <div class="menucard">
                <div class="m-img">
                    <div class="img-back">
                        <img :src="`/storage/${recipe.image}`" alt="">
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
                                <li v-for="vitamin in recipe.vitamins">{{ vitamin.name }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>

            <div class="z-container" v-if="recipe">
                    <h3>Zutaten:</h3>
                    <div v-for="ingredient in ingrediens">{{ ingredient.numberValue }} {{ ingredient.unitValue }} {{ ingredient.textValue }}</div>
                   
                </div>

            <div class="zubereitung" v-if="recipe">
                <h3>Zubereitung:</h3>
                <ol>
                    <li v-for="instruction in instructions">{{ instruction.ztextValue  }}</li>
                </ol>
            </div>

            <div class="a-container" v-if="recipe">
                <h3> Allergiker Informationen</h3>
                <div>Rezepte enthalten Allergene, die wir bei der Erstellung so gut wie möglich für Sie hier abbilden.</div><br>
                <ol>
                    <li v-for="allergies in recipe.allergies">{{ allergies.name }}</li>
                </ol>
            </div>     
    
        </div>

    </main>


</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            recipe: {},
            ingrediens: [],
            instructions: [],
            id: this.$route.params.id 
        };
    },
    beforeMount() {
        this.fetchRecipe();
    },
    methods: {
        fetchRecipe() {
            
            console.log('fetchRecipe wird aufgerufen');
            axios.get(`/api/recipes/${this.id}`)
                .then(response => {
                   
                    this.recipe = response.data.data;
                    this.ingrediens = JSON.parse(response.data.data.ingredients);
                    this.instructions = JSON.parse(response.data.data.instructions);
                    console.log('Hallo du', this.ingrediens);
                    console.log('Rezepte nach API-Aufruf:', this.recipe); // Loggen Sie die Daten nach dem Setzen
                })
                .catch(error => {
                    console.error('Fehler beim Abrufen der Rezepte:', error);
                });
        },
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

@media (max-width: 390px) {
    .menucard {
        width: 100%;
        border-top-left-radius: 150px;
        border-bottom-right-radius: 150px;
    }

    .card {
        width: 90%;
        background-color: rgba(179, 187, 195, 1);
        border-top-left-radius: 150px;
        border-bottom-right-radius: 150px; 
        padding-top: 50px;
        padding-left: 98px; 
    
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

    .img-back img {
        width: 125px;
        height: 100px;
        /* aspect-ratio: 16/9; */
        object-fit: cover;
        margin: 0 0 0 27px;
        border-radius: 25px;
}

    .img-back {
        width: 175px;
        height: 150px;
        border-radius: 25px;
        background-color: rgb(95, 68, 10);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-top: -38px;
        margin-left: -155px;
    }

    .tag-contaner {
        display: flex;
        flex-direction: column;
        font-size: 14px;

    }

    .titel {
        font-size: 14px;
        font-weight: bold;
        color: #393636;
        margin-top: -18px;
        margin-left: -46px;
    }

    .kategorie {
        display: flex;
        font-size: 14px;
        color: #393636;
        /* margin-left:  165px; */
        margin-top: -13px;
        margin-left: -46px;
    }

    .herkunft {
        font-size: 14px;
        color: #393636;
        margin-top: -4px;
        margin-left: -46px;
    }

    .vegi {
        font-size: 14px;
        color: #393636;
        margin-top: -3px;
        margin-left: -46px;
    }

    .autor {
        font-size: 14px;
        color: #393636;
        /* margin-left: 165px; */
        margin-top: 16px;
        margin-left: -46px;

    }

    .nährwert h3 {
        font-size: 12px;
        margin-top: 16px;
        margin-left: -46px;
    }  

    .nährwert li {
        font-size: 15px;
    }

    .titel {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .kategorie,
    .herkunft,
    .vegi,
    .autor {
        font-size: 12px;
    }

    .z-container {
        margin: 50px 0px 0px 100px;
    }

    .z-container h3 {
        font-size: 18px;
        margin-left: -179px;
    }

    .z-container div {
        font-size: 27px;  
    }

    .zubereitung {
        margin: 50px 0px 0px 100px;
        width: 80%;
        display: flex;
    }

    .zubereitung h3 {
        font-size: 18px;
        margin-left: -179px;
    }

    .a-container {
        margin-left: -79px;
    }
}

</style>