<template>
    <div>
        <h1>Zutaten erstellen</h1>
        <div class="input-container">
            <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="numberValue" />
            <select class="el-drop" v-model="unitValue">
                <option value="EL">EL</option>
                <option value="g">g</option>
                <option value="stk">Stk.</option>
            </select>
            <textarea class="textfield" placeholder="Zutat Eingeben" v-model="textValue"></textarea>
            <button class="plus-b" @click="addFields">+</button>
        </div>
        <div class="input-container" v-for="(field, index) in fields" :key="index">
            <input class="nr-field" type="number" placeholder="Einheit Eingeben (Zahl)" v-model="field.numberValue" />
            <select class="el-drop" v-model="field.unitValue">
                <option value="EL">EL</option>
                <option value="g">g</option>
                <option value="stk">Stk.</option>
            </select>
            <textarea class="textfield" placeholder="Zutat Eingeben" v-model="field.textValue"></textarea>
        </div>
    </div>

    <div class="infobox">
        <p class="i-titel">Zutaten erstellen:</p>
        <p>Die Zutaten werden in der Reihenfolge angezeigt, in der sie hinzugefügt wurden.
            Zuerst wird die Menge wie z.B. 2, dann die Einheit wie 
            z.B. EL (EL = Esslöffel) und zuletzt die Zutat wie z.B. Mehl angezeigt.</p>
        <p>Eine neue Zutat können durch Klicken auf das Pluszeichen hinzugefühgt werden.</p>
        <p>EL = Esslöffel, g = Gramm, Stk. = Stück. </p>
    </div>
        
</template>



<script>

export default {
    data() {
        return {
            numberValue: '',
            unitValue: '',
            textValue: '',
            fields: []
        };
    },
    methods: {
        addFields() {
            this.fields.push({
                numberValue: '',
                unitValue: '',
                textValue: ''
            });
        }
    }
};
</script>

<style scoped>

.input-container {
    display: flex;
    justify-content: space-between;
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
    position: absolute;
    left: 630px;
    font-size: 40px;
    text-align: center; 
    line-height: 28px;
}

.infobox {
    width: 300px;
    background-color: rgba(179, 187, 195, 1);
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
    font-size: 18px;
    text-align: justify;
    position : absolute;
    top: 0px;
    left: 700px;
}

.i-titel {
    font-size: 20px;
    font-weight: bold;
    color: #393636;
    margin-bottom: 10px;
}
</style>