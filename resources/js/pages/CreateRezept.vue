<script setup>

import { useRouter } from 'vue-router';
import { ref } from 'vue';
import axios from 'axios';

const imageUrl = ref(null);
const selectedCountry = ref('');
const countries = ref(['k.A.', 'Schweiz', 'Deutschland', 'Östereich', 'Afghanistan', 'Ägypten', 
            'Åland', 'Albanien', '	Algerien', 'Amerikanische Jungferninseln', 'Amerikanisch-Samoa', 'Andorra', 'Angola', 
            'Anguilla', 'Antarktika', 'Antigua und Barbuda', 'Äquatorialguinea', 'Argentinien', 'Armenien', 
            'Aruba', 'Aserbaidschan', 'Äthiopien', 'Australien', 'Bahamas', 'Bahrain', 
            'Bangladesch', 'Barbados', 'Bassas da India', 'Belarus', 'Belgien', 
            'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivien', 'Bosnien und Herzegowina', 
            'Botsuana', 'Bouvetinsel', 'Brasilien', 'Britische Jungferninseln', 'Britisches Territorium im Indischen Ozean', 'Brunei Darussalam', 
            'Bulgarien', 'Burkina Faso', 'Burundi', 'Cabo Verde', '	Chile', 'China', 'Clipperton', 'Cookinseln', 'Costa Rica', 'Côte d Ivoire',
            'Dänemark', 'Dominica', 'Dominikanische Republik', 'Dschibuti', 'Ecuador',
            'El Salvador', 'Eritrea', 'Estland', 'Eswatini', 'Falklandinseln', 'Färöer', 'Fidschi', 'Finnland', 'Frankreich', 'Französisch-Guayana', 'Französisch-Polynesien', 'Gabun',
            'Gambia', 'Gazastreifen', 'Georgien', 'Ghana', 'Gibraltar', 'Glorieuses', 'Grenada', 'Griechenland',
            'Grönland', 'Großbritannien', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Heard und McDonaldinseln', 'Honduras', 'Hongkong', 'Indien', 'Indonesien', 'Insel Man', 'Irak', 'Iran', 'Irland', 'Island', 'Israel', 'Italien', 'Jamaika', 'Japan', 'Jemen', 'Jersey',
            'Jordanien', 'Juan de Nova', 'Kaimaninseln', 'Kambodscha', 'Kamerun', 'Kanada', 'Kasachstan', 'Katar', 'Kenia', 'Kirgisistan', 'Kiribati', 'Kokosinseln (Keelinginseln)', 'Kolumbien', 'Komoren', 'Kongo', 'Korea, Demokratische Volksrepublik', 'Korea, Republik', 
            'Kosovo', 'Kroatien', 'Kuba', 'Kuwait', 'Laos', 'Lesotho', 'Lettland', 'Libanon', '	Liberia', 'Libyen', 'Liechtenstein', 'Litauen', 'Luxemburg', 'Macau', 'Madagaskar', 'Malawi', 'Malaysia',
            'Malediven', 'Mali', 'Malta', 'Marokko', 'Marshallinseln', 'Martinique', 'Mauretanien', 'Mauritius', 'Mayotte', 'Mexiko', 'Mikronesien', 'Moldau', 'Monaco', 'Mongolei', 'Montenegro', 'Montserrat', 'Mosambik',
            'Myanmar', 'Namibia', '	Nauru', 'Nepal', 'Neukaledonien', 'Neuseeland', 'Nicaragua', 'Niederlande', 'Niger', 'Nigeria', 'Niue', 'Nördliche Marianen', 'Nordmazedonien', 'Norfolkinsel', 'Norwegen', 'Oman', 'Pakistan',
            'Palau', 'Panama', 'Papua-Neuguinea', 'Paraguay', 'Peru', '	Philippinen', 'Pitcairninseln', 'Polen', 'Portugal', 'Puerto Rico', 'Réunion', 'Ruanda', 'Rumänien', 'Russische Föderation', 'Saint-Martin', 'Salomonen', 'Sambia',
            'Samoa', 'San Marino', 'São Tomé und Príncipe', 'Saudi-Arabien', 'Schweden', 'Senegal', 'Serbien', 'Serbien und Montenegro', 'Seychellen', 'Sierra Leone', 'Simbabwe', 'Singapur', 'Slowakei', 'Slowenien', 'Somalia', 'Spanien', 'Spitzbergen',
            'Sri Lanka', 'St. Barthélemy', 'St. Helena, Ascension und Tristan da Cunha', 'St. Kitts und Nevis', 'St. Lucia', 'St. Pierre und Miquelon', 'St. Vincent und die Grenadinen', 'Südafrika', 'Sudan', 'Südgeorgien', 'Südsudan', 'Suriname', 'Syrien', 'Tadschikistan', 'Taiwan', 'Tansania', 'Thailand',
            'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad und Tobago', 'Tromelin', 'Tschad', 'Tschechische Republik', 'Tunesien', 'Türkei', 'Turkmenistan', 'Turks- und Caicosinseln', 'Tuvalu', 'Uganda', 'Ukraine', 'Ungarn', 'Uruguay',
            'Usbekistan', 'Vanuatu', 'Vatikanstadt', 'Venezuela', 'Vereinigte Arabische Emirate', 'USA', 'Vietnam', 'Wallis und Futuna', 'Weihnachtsinsel', 'Westjordanland', 'Westsahara', 'Zentralafrikanische Republik', 'Zypern']);
const textValue = ref('');
const fields = ref([]);
const zFields = ref([]);


</script>

<template>
    <main> 

        <div class="titel"> 

            <div class="img-container">
                <p>Rezept Bild Hochladen</p>
                <input type="file" @change="handleFileUpload" accept="image/*">
                <img :src="imageUrl" alt="Uploaded Image" v-if="imageUrl">
            </div>

            <div class="r-titel">
                <input class="r-box" type="text" placeholder="Rezept Titel eingeben">

                <h4>Neue Kategorie erstellen</h4>

                <form class="h-label">
                    <div class="h-label1">
                        <input type="radio" id="vorspeise" name="kategorie" value="Vorspeise">
                        <label for="vorspeise">Vorspeise</label>

                        <input type="radio" id="hauptgang" name="kategorie" value="Hauptgang">
                        <label for="hauptgang">Hauptgang</label>

                        <input type="radio" id="dessert" name="kategorie" value="Dessert">
                        <label for="dessert">Dessert</label>
                    </div>

                    <div class="h-label2">
                        <input type="radio" id="suppe" name="kategorie" value="Suppe">
                        <label for="suppe">Suppe</label>

                        <input type="radio" id="salat" name="kategorie" value="Salat">
                        <label for="salat">Salat</label>

                        <input type="radio" id="beilage" name="kategorie" value="Beilage">
                        <label for="beilage">Beilage</label>
                    </div>

                    <div class="h-label3">
                        <input type="radio" id="kinder-menu" name="kategorie" value="Kinder Menü">
                        <label for="kinder-menu">Kinder Menü</label>

                        <input type="radio" id="gebaeck" name="kategorie" value="Gebäck">
                        <label for="gebaeck">Gebäck</label>

                        <input type="radio" id="drinks" name="kategorie" value="Drinks">
                        <label for="drinks">Drinks</label>
                    </div>
                
                </form>
        
                <div class="place2">
                    <form class="s-label">
                        <input type="radio" id="vegan" name="kategorie" value="Vegan">
                        <label for="vegan">Vegan</label>

                        <input type="radio" id="vegetarisch" name="kategorie" value="Vegetarisch">
                        <label for="vegetarisch">Vegetarisch</label>

                        <input type="radio" id="fleisch" name="kategorie" value="Fleisch">
                        <label for="fleisch">Fleisch</label>

                        <input type="radio" id="ka" name="kategorie" value="ka">
                        <label for="ka">k.A</label>
                    </form>
                </div>

                <div class="place3">
                    <div class="t-label">
                        <label for="herkunft"> Das Rezept kommt aus?</label>
                        <select v-model="selectedCountry">
                            <option value="" disabled selected>Land auswählen</option>
                            <option v-for="country in countries" :key="country">{{ country }}</option>
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
                    <p>EL = Esslöffel, Kg. = Kilogramm, g = Gramm, Stk. = Stück l = Liter, Dl. = Deziliter.  </p>
                </div>

                <div class="nr-container">
                    <div class="input-container1">
                        <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="numberValue" />
                        <select class="el-drop" v-model="unitValue">
                            <option value="EL">EL</option>
                            <option value="kg">Kg.</option>
                            <option value="g">g</option>
                            <option value="stk">Stk.</option>
                            <option value="l">l.</option>
                            <option value="dl">Dl.</option>
                        </select>
                        <textarea class="textfield-zu" placeholder="Zutat Eingeben" v-model="textValue"></textarea>
                        <button class="plus-b" @click="addFields">+</button>
                        <button class="minus-b" @click="removeField(index)">-</button>
                    </div>
                    <div class="input-container2" v-for="(field, index) in fields" :key="index">
                        <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="field.numberValue" />
                        <select class="el-drop" v-model="field.unitValue">
                            <option value="EL">EL</option>
                            <option value="kg">Kg.</option>
                            <option value="g">g</option>
                            <option value="stk">Stk.</option>
                            <option value="l">l.</option>
                            <option value="dl">Dl.</option>
                        </select>
                        <textarea class="textfield-zu" placeholder="Zutat Eingeben" v-model="field.textValue"></textarea>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="zu-container">
            <div>
                <h2>Zubereitung detailiert eintragen</h2>
                <div class="zubereitung">
                    <textarea class="textfield" placeholder="Zubereitung erster Schritt" v-model="textValue"></textarea>
                    <button class="plus-b" @click="addzFields">+</button>
                    <button class="minus-b" @click="removezField(index)">-</button>
                </div>
                <div class="zubereitung" v-for="(field, index) in zFields" :key="index">
                    <textarea class="textfield" placeholder="Weiterer Zubereitung Schritt" v-model="field.textValue"></textarea>
                </div>
            </div>
        </div>
        
        <div class="allergene">
            <h2>Mögliche Allergene im Rezept</h2>
            <div class="checkbox-container">
                <div class="al-box">
                    <input type="checkbox" id="gluten" name="allergene" value="gluten">
                    <label for="gluten">Glutenhaltige Getreide</label>
                    <input type="checkbox" id="laktose" name="allergene" value="laktose">
                    <label for="laktose">Milch (einschliesslich Laktose)</label>
                    <input type="checkbox" id="ei" name="allergene" value="ei">
                    <label for="ei">Eier</label>
                    <input type="checkbox" id="soja" name="allergene" value="soja">
                    <label for="soja">Sojabohnen</label>
                    <input type="checkbox" id="erdnuss" name="allergene" value="erdnuss">
                    <label for="erdnuss">Erdnuss</label>
                    <input type="checkbox" id="nuss" name="allergene" value="nuss">
                    <label for="nuss">Hartschalenopst (Nüsse)</label>
                    <input type="checkbox" id="fisch" name="allergene" value="fisch">
                    <label for="fisch">Fisch</label>
                    <input type="checkbox" id="krebstiere" name="allergene" value="krebstiere">
                    <label for="krebstiere">Krebstiere</label>
                    <input type="checkbox" id="sellerie" name="allergene" value="sellerie">
                    <label for="sellerie">Sellerie</label>
                    <input type="checkbox" id="senf" name="allergene" value="senf">
                    <label for="senf">Senf</label>
                </div>
                <div class="al-box2">
                    <input type="checkbox" id="sesam" name="allergene" value="sesam">
                    <label for="sesam">Sesam-Samen</label>
                    <input type="checkbox" id="schwefeldioxid" name="allergene" value="schwefeldioxid">
                    <label for="schwefeldioxid">Schwefeldioxid (Trocken Obst, Opstsäfte, Marmeladen...)</label>
                    <input type="checkbox" id="sulfate" name="allergene" value="sulfate">
                    <label for="sulfate">Sulfate (Äpfel, Reis, Zwibeln, Kohl, sowie Wein)</label>
                    <input type="checkbox" id="lupine" name="allergene" value="lupine">
                    <label for="lupine">Lupine (Mehl, Nudeln, Kaffee-, Milch- und Fleischersatz)</label>
                    <input type="checkbox" id="weichtiere" name="allergene" value="weichtiere">
                    <label for="weichtiere">Weichtiere (Schnecken, Muscheln, Tintenfische...)</label>
                    <input type="checkbox" id="hausgrillenpulver" name="allergene" value="hausgrillenpulverweichtiere">
                    <label for="hausgrillenpulver">Hausgrillenpulver (Kekse, Saucen, Pizzas...)</label>
                </div>
            </div>
            
        </div>

        <div class="Vitamin-Contanier">
            <h2>Vitamin- und Nährwertangaben</h2>
            <div class="input-container">
                <div class="infobox">
                    <p class="i-titel">Vitamin- und Nährwertangaben:</p>
                    <p>Welche Vitamine sind in Ihrem Rezept? Nutzen Sie unsere Top-Vitamin-Lieferantenliste. 
                        Wählen Sie die Vitamine aus, die in Ihrem Rezept enthalten sind.</p>
                </div>
                    <div class="vit-box">
                        <input type="checkbox" id="vitamin-d" name="vitamins" value="vitamin-d">
                        <label for="vitamin-a">Vitamin A: Leber, Milchprodukte, Eigelb, buntes Gemüse wie z.B.. Karotten, Spinat</label> 
                        <input type="checkbox" id="vitamin-d" name="vitamins" value="vitamin-d">
                        <label for="vitamin-d">Vitamin D: Fisch, Milch, Eier, Avocado, Butter, Champignons</label>
                        <input type="checkbox" id="vitamin-e" name="vitamins" value="vitamin-e">
                        <label for="vitamin-e">Vitamin E: Pflanzenöle und -fette, Nüsse, Vollkorngetreide</label>
                        <input type="checkbox" id="vitamin-k" name="vitamins" value="vitamin-k">
                        <label for="vitamin-k">Vitamin K: Grünes Gemüse, Kohl, Salat, Kresse, Hähnchenfleisch</label>
                        <input type="checkbox" id="vitamin-b1" name="vitamins" value="vitamin-b1">
                        <label for="vitamin-b1">Vitamin B1: Kartoffeln, Fleisch, Hülsenfrüchte, Weizenkeime</label>
                        <input type="checkbox" id="vitamin-b2" name="vitamins" value="vitamin-b2">
                        <label for="vitamin-b2">Vitamin B2: Milchprodukte, Vollkorngetreide, Fleisch, Fisch, dunkles Blattgemüse</label>
                        <input type="checkbox" id="vitamin-b3" name="vitamins" value="vitamin-b3">
                        <label for="vitamin-b3">Vitamin B3: Bierhefe, Fisch, Geflügel, Eier, Erdnüsse, Erbsen</label>
                        <input type="checkbox" id="vitamin-b5" name="vitamins" value="vitamin-b5">
                        <label for="vitamin-b5">Vitamin B5: Leber, Vollkorngetreide, Kohl, Fleisch, Nüsse</label>
                        <input type="checkbox" id="vitamin-b6" name="vitamins" value="vitamin-b6">
                        <label for="vitamin-b6">Vitamin B6: Bananen, Nüsse, Vollkorngetreide, Leber, Kartoffeln</label>
                        <input type="checkbox" id="vitamin-b7" name="vitamins" value="vitamin-b7">
                        <label for="vitamin-b7">Vitamin B7: Eigelb, Haferflocken, Sojabohnen, Naturreis, Erdnüsse</label>
                        <input type="checkbox" id="vitamin-b9" name="vitamins" value="vitamin-b9">
                        <label for="vitamin-b9">Vitamin B9: Grünes Blattgemüse, Leber, Weizenkeime, Fisch, Fleisch</label>
                        <input type="checkbox" id="vitamin-b12" name="vitamins" value="vitamin-b12">
                        <label for="vitamin-b12">Vitamin B12: Eigelb, Fisch, Leber, Milchprodukte</label>
                        <input type="checkbox" id="vitamin-c" name="vitamins" value="vitamin-c">
                        <label for="vitamin-c">Vitamin C: Zitrusfrüchte, Paprika, Tomaten, Hagebutte, Sanddorn</label>
                        
                    </div>
            </div>
                   
        </div>

    </main>  
</template>

<script>
export default {
    data() {
        return {
            imageUrl: null,
            selectedCountry: '',
            countries: ['k.A.', 'Schweiz', 'Deutschland', 'Östereich', 'Afghanistan', 'Ägypten', 
            'Åland', 'Albanien', '	Algerien', 'Amerikanische Jungferninseln', 'Amerikanisch-Samoa', 'Andorra', 'Angola', 
            'Anguilla', 'Antarktika', 'Antigua und Barbuda', 'Äquatorialguinea', 'Argentinien', 'Armenien', 
            'Aruba', 'Aserbaidschan', 'Äthiopien', 'Australien', 'Bahamas', 'Bahrain', 
            'Bangladesch', 'Barbados', 'Bassas da India', 'Belarus', 'Belgien', 
            'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivien', 'Bosnien und Herzegowina', 
            'Botsuana', 'Bouvetinsel', 'Brasilien', 'Britische Jungferninseln', 'Britisches Territorium im Indischen Ozean', 'Brunei Darussalam', 
            'Bulgarien', 'Burkina Faso', 'Burundi', 'Cabo Verde', '	Chile', 'China', 'Clipperton', 'Cookinseln', 'Costa Rica', 'Côte d Ivoire',
            'Dänemark', 'Dominica', 'Dominikanische Republik', 'Dschibuti', 'Ecuador',
            'El Salvador', 'Eritrea', 'Estland', 'Eswatini', 'Falklandinseln', 'Färöer', 'Fidschi', 'Finnland', 'Frankreich', 'Französisch-Guayana', 'Französisch-Polynesien', 'Gabun',
            'Gambia', 'Gazastreifen', 'Georgien', 'Ghana', 'Gibraltar', 'Glorieuses', 'Grenada', 'Griechenland',
            'Grönland', 'Großbritannien', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Heard und McDonaldinseln', 'Honduras', 'Hongkong', 'Indien', 'Indonesien', 'Insel Man', 'Irak', 'Iran', 'Irland', 'Island', 'Israel', 'Italien', 'Jamaika', 'Japan', 'Jemen', 'Jersey',
            'Jordanien', 'Juan de Nova', 'Kaimaninseln', 'Kambodscha', 'Kamerun', 'Kanada', 'Kasachstan', 'Katar', 'Kenia', 'Kirgisistan', 'Kiribati', 'Kokosinseln (Keelinginseln)', 'Kolumbien', 'Komoren', 'Kongo', 'Korea, Demokratische Volksrepublik', 'Korea, Republik', 
            'Kosovo', 'Kroatien', 'Kuba', 'Kuwait', 'Laos', 'Lesotho', 'Lettland', 'Libanon', '	Liberia', 'Libyen', 'Liechtenstein', 'Litauen', 'Luxemburg', 'Macau', 'Madagaskar', 'Malawi', 'Malaysia',
            'Malediven', 'Mali', 'Malta', 'Marokko', 'Marshallinseln', 'Martinique', 'Mauretanien', 'Mauritius', 'Mayotte', 'Mexiko', 'Mikronesien', 'Moldau', 'Monaco', 'Mongolei', 'Montenegro', 'Montserrat', 'Mosambik',
            'Myanmar', 'Namibia', '	Nauru', 'Nepal', 'Neukaledonien', 'Neuseeland', 'Nicaragua', 'Niederlande', 'Niger', 'Nigeria', 'Niue', 'Nördliche Marianen', 'Nordmazedonien', 'Norfolkinsel', 'Norwegen', 'Oman', 'Pakistan',
            'Palau', 'Panama', 'Papua-Neuguinea', 'Paraguay', 'Peru', '	Philippinen', 'Pitcairninseln', 'Polen', 'Portugal', 'Puerto Rico', 'Réunion', 'Ruanda', 'Rumänien', 'Russische Föderation', 'Saint-Martin', 'Salomonen', 'Sambia',
            'Samoa', 'San Marino', 'São Tomé und Príncipe', 'Saudi-Arabien', 'Schweden', 'Senegal', 'Serbien', 'Serbien und Montenegro', 'Seychellen', 'Sierra Leone', 'Simbabwe', 'Singapur', 'Slowakei', 'Slowenien', 'Somalia', 'Spanien', 'Spitzbergen',
            'Sri Lanka', 'St. Barthélemy', 'St. Helena, Ascension und Tristan da Cunha', 'St. Kitts und Nevis', 'St. Lucia', 'St. Pierre und Miquelon', 'St. Vincent und die Grenadinen', 'Südafrika', 'Sudan', 'Südgeorgien', 'Südsudan', 'Suriname', 'Syrien', 'Tadschikistan', 'Taiwan', 'Tansania', 'Thailand',
            'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad und Tobago', 'Tromelin', 'Tschad', 'Tschechische Republik', 'Tunesien', 'Türkei', 'Turkmenistan', 'Turks- und Caicosinseln', 'Tuvalu', 'Uganda', 'Ukraine', 'Ungarn', 'Uruguay',
            'Usbekistan', 'Vanuatu', 'Vatikanstadt', 'Venezuela', 'Vereinigte Arabische Emirate', 'USA', 'Vietnam', 'Wallis und Futuna', 'Weihnachtsinsel', 'Westjordanland', 'Westsahara', 'Zentralafrikanische Republik', 'Zypern'],
            textValue: '',
            fields: [],
            zFields: []
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = () => {
                this.imageUrl = reader.result;
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
                textValue: ''
            });
        },

        removeField(index) {
            this.fields.splice(index, 1);
        },

        removezField(index) {
            this.zFields.splice(index, 1);
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

    /* IMG container - Rezept Titel - Kategorien - Länder */
    .titel {
        display: flex;
        padding: 50px 0 0 100px;
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
        grid-template-columns: 50px 15px;
        grid-column-gap: 5px;
    }

    .h-label2 {
        display: grid;
        grid-template-columns: 50px 15px;
        grid-column-gap: 5px;
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

    .zutaten h2 {
        font-size: 30px;
        margin: 60px 0 20px 60px;
    }

    .input-container {
        display: flex;
    }

    .textfield-zu {
        width: 400px;
        height: 30px;
        margin-right: 20px;
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
        height: 30px;
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
        width: 50px;
        height: 50px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 40px;
        text-align: center; 
        line-height: 28px;
        margin-right: 5px;
    }

    .minus-b {
        width: 50px;
        height: 50px;
        background-color: #0073ff;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 40px;
        text-align: center; 
        line-height: 28px;
    }

    .infobox {
        width: 300px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 10px;
        padding: 20px;
        margin: 0 10px 0 50px ;
        font-size: 18px;
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
        width: 500px;
        margin: 50px 0 0 100px;
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

    .plus-b {
        width: 50px;
        height: 50px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 40px;
        text-align: center; 
        line-height: 28px;
    }

    /* Allergie Container */

    .allergene {
        display: flex;
        flex-direction: column;
        margin: 50px 0 0 100px;
        padding-bottom: 50px;
    }

    .checkbox-container {
        font-size: 26px;
        display: grid;
        grid-template-columns: 480px 480px;
        grid-column-gap: 20px;
        grid-row-gap: 10px;
        margin: 50px 0 0 100px;
    }

    .allergene h2 {
        font-size: 30px;
        margin: 20px 0 0 100px;
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
    .infobox2 {
        width: 500px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 10px;
        padding: 20px;
        margin: 0 10px 0 50px ;
        font-size: 18px;
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



</style>