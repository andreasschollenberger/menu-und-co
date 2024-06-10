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

        <div>
        <h1>Zutaten erstellen</h1>
        <div class="input-container">

            <div class="infobox">
                <p class="i-titel">Zutaten erstellen:</p>
                <p>Die Zutaten werden in der Reihenfolge angezeigt, in der sie hinzugefügt wurden.
                    Zuerst wird die Menge wie z.B. 2, dann die Einheit wie 
                    z.B. EL (EL = Esslöffel) und zuletzt die Zutat wie z.B. Mehl angezeigt.</p>
                <p>Eine neue Zutat können durch Klicken auf das Pluszeichen hinzugefühgt werden.</p>
                <p>EL = Esslöffel, Kg. = Kilogramm, g = Gramm, Stk. = Stück l = Liter, Dl. = Deziliter.  </p>
            </div>


            <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="numberValue" />
            <select class="el-drop" v-model="unitValue">
                <option value="EL">EL</option>
                <option value="kg">Kg.</option>
                <option value="g">g</option>
                <option value="stk">Stk.</option>
                <option value="l">l.</option>
                <option value="dl">Dl.</option>
            </select>
            <textarea class="textfield" placeholder="Zutat Eingeben" v-model="textValue"></textarea>
            <button class="plus-b" @click="addFields">+</button>
        <!-- </div> -->
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
                <textarea class="textfield" placeholder="Zutat Eingeben" v-model="field.textValue"></textarea>
            </div>
        </div>
    </div>

        
        <div class="zu-container">
            <div class="zubereitung">
                <h1>Zubereitung detailiert eintragen</h1>
                <div>
                    <textarea class="textfield" placeholder="Zubereitung erster Schritt" v-model="textValue"></textarea>
                    <button class="plus-b" @click="addFields">+</button>
                </div>
                <div v-for="(field, index) in fields" :key="index">
                    <textarea class="textfield" placeholder="Weiterer Zubereitung Schritt" v-model="field.textValue"></textarea>
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
            'Usbekistan', 'Vanuatu', 'Vatikanstadt', 'Venezuela', 'Vereinigte Arabische Emirate', 'USA', 'Vietnam', 'Wallis und Futuna', 'Weihnachtsinsel', 'Westjordanland', 'Westsahara', 'Zentralafrikanische Republik', 'Zypern',],
            textValue: '',
            fields: []
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

.titel {
    display: flex;
    padding: 50px 0 0 400px;
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
    font-size: 18px;
    margin-bottom: 20px;
}

.t-label Label {
    width: 200px;
    height: 30px;
    margin-right: 20px;
    text-align: center;
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

.input-container {
    display: flex;
}

.input-container2 {
    display: flex;
    /* flex-direction: column; */
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
    /* position: absolute;
    left: 630px; */
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

    /* position : absolute;
    top: 0px;
    left: 700px; */
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
    margin: 50px 0 0 400px;
}

.textfield {
    width: 800px;
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


</style>