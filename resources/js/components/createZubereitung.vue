<template>

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
    
</template>



<script>

export default {
    data() {
        return {
            textValue: '',
            fields: []
        };
    },
    methods: {
        addFields() {
            this.fields.push({
                textValue: ''
            });
        }
    }
};
</script>

<style scoped>

.textfield {
    width: 1000px;
    height: 100px;
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
    left: 1020px;
    font-size: 40px;
    text-align: center; 
    line-height: 28px;
}

</style>