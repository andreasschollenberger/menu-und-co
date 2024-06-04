<template>
    <div class="menucard">
        <div class="menuimg">
            <img class="menuimg" src="/public/Assets/img/re-img.png" alt="" />
            <p class="titel">Rezept Name</p>
            <p class="kategorie">Kategorie: Haubtgericht</p>
            <p class="herkunft">Herkunft: Italien</p>
            <p class="vegi">Neigung: Vegetarisch</p>
            <p class="autor">Autor: Max Mustermann</p>

            <router-link to="/rezept">
                <button>Rezept Anschauen</button>
            </router-link>
        </div>

    </div> 
</template>


<style scoped>

.menucard {
    width: 1200px;
    height: 400px;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px;
    
}

img {
    border-radius: 50px;
    margin-top: 50px;
    margin-left: 120px;
}

.titel {
    font-size: 35px;
    font-weight: bold;
    color: #393636;
    position: absolute;
    top: 50px;
    left: 500px;
}

.kategorie {
    font-size: 25px;
    color: #393636;
    position: absolute;
    top: 120px;
    left: 500px;
}

.herkunft {
    font-size: 25px;
    color: #393636;
    position: absolute;
    top: 160px;
    left: 500px;
}

.vegi {
    font-size: 25px;
    color: #393636;
    position: absolute;
    top: 200px;
    left: 500px;
}

.autor {
    font-size: 25px;
    color: #393636;
    position: absolute;
    top: 280px;
    left: 500px;
}

button {
    width: 200px;
    height: 50px;
    background-color: #393636;
    color: white;
    font-size: 20px;
    border: none;
    border-radius: 10px;
    position: absolute;
    top: 320px;
    left: 900px;
}

.menucard button:hover {
    background-color: #555555;
    color: yellowgreen;
    cursor: pointer;
}
</style>
