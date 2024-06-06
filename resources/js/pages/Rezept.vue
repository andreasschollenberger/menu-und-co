<template>
    <main>
        <div class="card">
            <div class="menucard">
                <img src="/public/Assets/img/veganer-burger.png" alt="">
                <div class="tag-container">
                    <div class="titel">Veganer Burger</div>
                    <div class="kategorie">Kategorie: Hauptgericht</div>
                    <div class="herkunft">Herkunft: Amerika</div>
                    <div class="vegi">Vegi: Ja</div>
                    <div class="autor">Autor: Max Mustermann</div>
                </div>
            </div>

        </div>

    </main>


</template>


<style scoped>

main {
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
    padding: 50px;
}

.card {
    width: 90%;
    background-color: rgba(179, 187, 195, 1);
    border-top-left-radius: 150px;
    border-bottom-right-radius: 150px; 
    padding-top: 50px;
    padding-left: 20px; 
}

.menucard {
    display: flex;
    margin-top: 50px;
    margin-left: 50px;
}

.menucard img {
    width: 200px;
    aspect-ratio: 16/9;
    object-fit: cover;
    margin: 0 0 0 27px;
    border-radius: 25px;
    /* border-radius: 50px;
    margin-top: 50px;
    margin-left: 120px; */
}

.tag-contaner {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-left: 50px;
    
}

.titel {
    font-size: 36px;
}

.kategorie,
.herkunft,
.vegi,
.autor {
    font-size: 27px;
}

</style>