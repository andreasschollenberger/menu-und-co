<template>
    <main>
        <div class="titel-text">
            <h1>Rezept erstellen</h1>
        </div>

        <div class="titel">

            <div class="img-container">
                <p>Rezept Bild Hochladen</p>
                <input type="file" @change="handleFileUpload" accept="image/*">
                <img :src="imageUrl" alt="Uploaded Image" v-if="imageUrl">
            </div>

            <div class="r-titel">
                <input class="r-box" type="text" placeholder="Rezept Titel eingeben"v-model="title">

                <h4>Neue Kategorie erstellen</h4>

                <form class="h-label">
                    <div class="h-label1">
                        <label v-for="dish in dishes" :key="dish.id">
                            <input type="radio" :id="dish.id" name="dish_id" :value="dish.id" v-model="dish_id">
                            {{ dish.name }}
                        </label>
                    </div>
                    
                
                </form>
        
                <div class="place2">

                    <div class="h-label2">
                        <label v-for="recipes_group in recipes_groups" :key="recipes_group.id">
                            <input type="radio" :id="recipes_group.id" name="recipes_group_id" :value="recipes_group.id" v-model="recipes_group_id">
                            {{ recipes_group.name }}
                        </label>
                    </div>

                
                </div>

                <div class="place3">
                    <div class="t-label">
                        <label for="herkunft"> Das Rezept kommt aus?</label>
                        <select v-model="country_id">
                            <option value="" disabled selected>Land auswählen</option>
                            <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                        </select>

                    </div>
                </div>
            </div>
            
        </div>

        <div class="zutaten">
            <h2>Zutaten erstellen</h2>
            <div class="input-container">

                <div class="infobox">
                    <p class="i-titel">Zutaten erstellen:</p>
                    <p>Die Zutaten werden in der Reihenfolge angezeigt, in der sie hinzugefügt wurden.
                        Zuerst wird die Menge wie z.B. 2, dann die Einheit wie 
                        z.B. EL (EL = Esslöffel) und zuletzt die Zutat wie z.B. Mehl angezeigt.</p>
                    <p>Eine neue Zutat können durch Klicken auf das Pluszeichen hinzugefühgt werden.</p>
                    <p> Mit dem Minuszeichen entfenen Sie ein feld.</p>
                    <p>EL = Esslöffel, Kg. = Kilogramm, g = Gramm, Stk. = Stück l = Liter, Dl. = Deziliter, ml = Mililitter, n.B. = Nach belieben. </p>
                </div>

                <div class="nr-container">
                        <div class="input-container1" v-for="(field, index) in fields" :key="index">
                            <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="field.numberValue" />
                            <select class="el-drop" v-model="field.unitValue">
                                <option value="EL">EL</option>
                                <option value="kg">Kg.</option>
                                <option value="g">g</option>
                                <option value="stk">Stk.</option>
                                <option value="l">l.</option>
                                <option value="dl">Dl.</option>
                                <option value="bund">ml.</option>
                                <option value="prise">Prise</option>
                                <option value="bund">Bund</option>
                                <option value="bund">Tasse</option>
                                <option value="nb">n.B.</option>
                            </select>
                            <textarea class="textfield-zu" placeholder="Zutat Eingeben" v-model="field.textValue"></textarea>
                            <button class="plus-b" @click="addFields">+</button>
                            <button class="minus-b" v-if="index !== 0 || addFieldClicked" @click="removeField(index)">-</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="zu-container">
            <div>
                <h2>Zubereitung detailiert eintragen</h2>
                <div class="zubereitung" v-for="(field, index) in zFields" :key="index">
                    <textarea class="textfield" placeholder="Zubereitung Schritt eintragen" v-model="field.ztextValue"></textarea>
                    <button class="plus-b" @click="addzFields">+</button>
                    <button class="minus-b" v-if="index !== 0 || addzFieldClicked" @click="removezField(index)">-</button>
                </div>
            </div>
        </div>
        
        <div class="allergene">
            <h2>Mögliche Allergene im Rezept</h2>
            <div class="checkbox-container">
                <div v-for="allergy in allergies" :key="allergy.id" class="al-box">
                    <input type="checkbox" :id="allergy.id" :name="allergy.id" :value="allergy.id" v-model="allergy_selected">
                    <label :for="allergy.id">{{ allergy.name }}</label>
                </div>
                    
            </div>
            
        </div>

        <div class="vitamin-contanier">
            <h2>Vitaminangaben</h2>
            <div class="input-container">
                <div class="infobox2">
                    <p class="i-titel">Vitaminangaben:</p>
                    <p>Welche Vitamine sind in Ihrem Rezept? Nutzen Sie unsere Top-Vitamin-Lieferantenliste. 
                        Wählen Sie die Vitamine aus, die in Ihrem Rezept enthalten sind.</p>
                    <p>Für jedes Vitamin haben wir eine Liste erstellt, die zeigt, in welchen Lebensmitteln es vorkommt. 
                        Zum Beispiel enthält Vitamin A: Leber, Milchprodukte, Eigelb, sowie buntes Gemüse wie Karotten und Spinat.</p>
                </div>
                    <div class="checkbox-container2">
                        <div v-for="vitamin in vitamins" :key="vitamin.id" class="al-box">
                            <input type="checkbox" :id="vitamin.id" :name="vitamin.id" :value="vitamin.id" v-model="vitamins_selected">
                            <label :for="vitamin.id">{{ vitamin.name }}</label>
                        </div>
                        
                        
                    </div>
            </div>
                   
        </div>

        <div class="submit">
            <img src="/public/Assets/img/rezept-senden-bnt.png" alt="Submit" @click="submitForm">
        </div>

    </main>  
</template>

<script>

import { useRouter } from 'vue-router';
import axios from 'axios';

export const authClient = axios.create({
  baseURL: import.meta.env.VITE_BASE_URL,
  withCredentials: true, // required to handle the CSRF token
});


export default {
    data() {
        return {
            title: '',
            dish_id: '',
            recipes_group_id: '',
            imageUrl: null,
            image: null,
            selectedCountry: '',
            countries: [],
            allergies: [],
            allergy_selected: [],
            vitamins: [],
            vitamins_selected: [],
            textValue: '',
            fields: [{
                textValue: ''
            }],
            addFieldClicked: false,
            zFields: [{
                ztextValue: ''
            }],
            addzFieldClicked: false,
            numberValue: '',
            unitValue: '',
            ztextValue : '',
            dishes: [],
            recipes_groups: [],
            country_id: '',
        };
    },
    mounted() {
        this.getDishes();
        this.getRecipesGroups();
        this.getCountry();
        this.getAllergies();
        this.getVitamins();
    },
    methods: {

            async getDishes() {
                try {
                    const response = await authClient.get('/dishes');
                    this.dishes= response.data;
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

            async getVitamins() {
                try {
                    const response = await authClient.get('/vitamins');
                    this.vitamins = response.data;
                } catch (error) {
                    console.error(error);
                }
            },

        handleFileUpload(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = () => {
                this.imageUrl = reader.result;
                this.image = file;
            };

            reader.readAsDataURL(file);
        },
    
        addFields() {
            this.fields.push({
                textValue: ''
            });
        },

        addzFields() {
            this.zFields.push({
                ztextValue: ''
            });
        },

        

        removeField(index) {
            this.fields.splice(index, 1);
        },

        removezField(index) {
            this.zFields.splice(index, 1);
        },
        async submitForm() {
            const formData = new FormData();
            formData.append('image', this.image);
            formData.append('title', this.title);
            formData.append('dish_id', this.dish_id);
            formData.append('recipes_group_id', this.recipes_group_id);
            formData.append('country_id', this.country_id);
            formData.append('ingredients', JSON.stringify(this.fields));
            formData.append('instructions', JSON.stringify(this.zFields));
            formData.append('allergies', JSON.stringify(this.allergy_selected));
            formData.append('vitamins', JSON.stringify(this.vitamins_selected));

            

            try {
                await authClient.get("/sanctum/csrf-cookie");

                await authClient.post('/recipes', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.$router.push('/dashboard');
            } catch (error) {
                console.error(error);
            }
        }       
    }
};
</script>


<style scoped>

    /* Halbtransparenter Hintergrund */
    main {
        max-width: 90%;
        margin: auto;
        border-radius: 30px;
        background-color: rgba(222, 220, 220, 0.81);
    }

    .titel-text {
        display: flex;
        justify-content: center;
        padding-top: 50px;
    }

    .titel-text h1 {
        font-size: 40px;
    }

    /* IMG container - Rezept Titel - Kategorien - Länder */
    .titel {
        display: flex;
        justify-content: center;
    }
        
    .img-container {
        width: 250px;
        height: 300px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 25px;
        margin-right: 200px; 
    }

    .img-container img {
        width: 200px;
        aspect-ratio: 4/3;
        object-fit: cover;
        margin: 0 0 0 27px;
        border-radius: 25px;
    }

    .img-container p {
        font-size: 22px;
        text-align: center;
        margin-top: 10px;
    }

    .r-box {
        width: 450px;
        height: 40px;
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
        border-radius: 10px;
    }

    .h-label {
        display: flex;
        gap: 80px;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .h-label1 {
        display: grid;
        grid-template-columns: 155px 15px;
        grid-column-gap: 122px;
    }

    .h-label2 {
        display: grid;
        grid-template-columns: 50px 15px;
        grid-column-gap: 228px;
    }

    .h-label3 {
        display: grid;
        grid-template-columns: 50px 150px;
        grid-column-gap: 5px;
    }

    .s-label {
        display: grid;
        grid-template-columns: 50px 100px;
        grid-column-gap: 5px;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .t-label {
        display: flex;
        font-size: 18px;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .t-label Label {
        width: 45%;
        height: 30px;
    }

    .t-label select {
        width: 200px;
        height: 30px;
        border-radius: 10px;
        line-height: 28px;
        font-size: 18px;
    }

    .t-label input {
        width: 200px;
        height: 30px;
        border-radius: 10px;
        margin-right: 20px;
        text-align: center;
        line-height: 28px;
    }

    /* Zutaten Container */

    .zutaten {
        display: flex;
        flex-direction: column;
        align-items: center; 
        padding-bottom: 50px;
    }

    .zutaten h2 {
        font-size: 35px;
        margin: 60px auto 20px;
        text-align: center;
    }

    .input-container {
        display: flex;
    }


    .textfield-zu {
        width: 400px;
        height: 30px;
        margin-right: 20px;
        margin-bottom: -11px;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
    }

    .nr-container {
        display: flex;
        flex-direction: column;
    }

    .nr-field {
        width: 200px;
        height: 30px;
        margin-right: 20px;
        margin-bottom: 20px;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
    }

    .el-drop {
        width: 50px;
        height: 34px;
        margin-right: 20px;
        margin-bottom: 20px;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
    }

    .textfield {
        width: 300px;
        height: 30px;
        margin-right: 20px;
        margin-bottom: 20px;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
    }

    .plus-b {
        width: 40px;
        height: 40px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 40px;
        text-align: center; 
        line-height: 28px;
        margin-right: 5px;
        padding: 0 0 3px 0;
    }

    .minus-b {
        width: 40px;
        height: 40px;
        background-color: #0073ff;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 40px;
        text-align: center; 
        line-height: 28px;
        padding: 0 0 5px 0;
    }

    .infobox {
        width: 300px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 10px;
        padding: 20px;
        margin: 0 10px 0 50px ;
        font-size: 18px;
        max-height: 300px;
        overflow-y: auto;
        
    }

    .i-titel {
        font-size: 20px;
        font-weight: bold;
        color: #393636;
        margin-bottom: 10px;
    }


    /* Zubereitung Container */
    .zu-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .zu-container h2 {
        font-size: 35px;
        margin: 60px auto 20px;
        text-align: center;
    }

    .zubereitung {
        display: flex;
    }

    .textfield {
        width: 600px;
        height: 50px;
        margin-right: 20px;
        margin-bottom: 20px;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
        

    }

    
    /* Allergie Container */

    .allergene {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 50px 0 0 100px;
        padding-bottom: 50px;
    }

    .checkbox-container {
        font-size: 20px;
        display: grid;
        grid-template-columns: 500px 500px;
        grid-row-gap: 24px;
        margin: 50px 0 0 0;
        padding-left: 120px;
    }

    .allergene h2 {
        font-size: 35px;
        margin: 60px auto 20px;
        text-align: center;
    }

    [type="checkbox"] {
        width: 20px;
        height: 20px;

    }

    .al-box {
        display: grid;
        grid-template-columns: 50px 300px;
        grid-column-gap: 5px;
    }


    .al-box2 {
        display: grid;
        grid-template-columns: 50px 250px;
        grid-column-gap: 5px;
    }

    .al-box input, label {
        display: flex;
    }

    /* Vitamin Container */

    .vitamin-contanier h2 {
        font-size: 35px;
        margin: 60px auto 20px;
        text-align: center;
    }


    .infobox2 {
        width: 350px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 10px;
        padding: 20px;
        margin: -303px 0 0 50px ;
        font-size: 18px;
        max-height: 300px;
        overflow-y: auto;
        
    }

    .vit-box {
        display: grid;
        grid-template-columns: 50px 300px;
        grid-column-gap: 5px;
    }

    .vit-box2 {
        display: grid;
        grid-template-columns: 50px 300px;
        grid-column-gap: 5px;
    }

    .checkbox-container2 {
        font-size: 20px;
        display: grid;
        grid-template-columns: 450px 450px;
        grid-row-gap: 24px;
        margin: 45px 0 0 0;
        padding-left: 20px;
    }

    .input-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .submit {
        display: flex;
        justify-content: center;
        margin-top: 80px;
        padding-bottom: 85px;
    }


</style>