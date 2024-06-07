<template>
    <div class="menucard">
        <div class="menu-container">
            <img class="menuimg" src="/public/Assets/img/re-img.png" alt="" />

            <div class="menu-text">
                <div class="titel">Rezept Name</div>
                <div class="kategorie">Kategorie: Haubtgericht</div>
                <div class="herkunft">Herkunft: Italien</div>
                <div class="vegi">Neigung: Vegetarisch</div>
                <div class="autor">Autor: Max Mustermann</div>
                
                <router-link to="/rezept">
                    <div class="button">
                        <button>Rezept Anschauen</button>
                    </div>
                </router-link>
            </div>
        </div>

    </div> 
</template>


<style scoped>

.menucard {
    width: 100%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px;  
}

.menu-container {
    display: flex;
}

.menu-text {
    display: flex;
    flex-direction: column;
    width: 300px;
    margin: 50px 100px 50px 150px;
    
}

img {
    border-radius: 50px;
    margin-top: 50px;
    margin-left: 120px;
    margin-bottom: 50px;
}

.titel {
    font-size: 35px;
    font-weight: bold;
    color: #393636;
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

button {
    width: 200px;
    height: 50px;
    background-color: #393636;
    color: white;
    font-size: 20px;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
}

.menucard button:hover {
    background-color: #555555;
    color: yellowgreen;
    cursor: pointer;
}
</style>