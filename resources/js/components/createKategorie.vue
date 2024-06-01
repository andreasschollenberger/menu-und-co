<template>
    <div>
        <h1>Neue Kategorie erstellen</h1>

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
    </div>
    <div>
        <form class="s-label">
            <input type="radio" id="vegan" name="kategorie" value="Vegan">
            <label for="vegan">Vegan</label>

            <input type="radio" id="vegetarisch" name="kategorie" value="Vegetarisch">
            <label for="vegetarisch">Vegetarisch</label>
        </form>
    </div>

    <div class="t-label">
        <input type="text" id="herkunft" name="herkunft">
        <label for="herkunft">  Herkunft</label>
    </div>

</template>


<style scoped>

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

.t-label input {
    width: 200px;
    height: 30px;
    margin-right: 20px;
    text-align: center;
    line-height: 28px;
}
    
</style>