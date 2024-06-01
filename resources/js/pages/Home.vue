<script setup>
import headerpic from '../components/header.vue';
import hamburger from '../components/hamburger.vue';
import rezcard from '../components/menucard.vue';
import createZutaten from '../components/createZutaten.vue';
import createKategorie from '../components/createKategorie.vue';

</script>
<template>
<body>
    <div>
        <header>
            <headerpic />

            <div class="ham-nav">
                <hamburger />
            </div>

        </header>
    </div>
    <main>
        <div class="semicontainer">
            <div class="semitransparent">
                <div class="test1">
                    <rezcard />
                </div>
                <div class="test2">
                    <createZutaten />
                </div>
                <div class="test3">
                    <createKategorie />
                </div>

                <div class="w-text">
                    <h1>Willkommen bei unserer Rezepte-Plattform!</h1>
                    <p>Als Gast haben Sie die Möglichkeit, alle unsere köstlichen Rezepte
                         und nützlichen Informationen einzusehen und auszuprobieren. 
                         Tauchen Sie ein in die Welt des Kochens und entdecken Sie eine 
                         Vielzahl von Gerichten für jeden Geschmack.</p>
                    <p>Für unsere registrierten Benutzer bieten wir noch mehr 
                        Möglichkeiten. Werden Sie Teil unserer Community 
                        und erstellen Sie Ihre eigenen Rezepte! Ihre Kreativität 
                        und kulinarischen Fähigkeiten helfen dabei, unsere Datenbank 
                        mit Leben zu füllen.</p>
                </div>

                <div class="homelogo">
                    <img class="homeimg" src="/public/Assets/img/homelogo.png" alt="Home Logo" />
                </div>

                <div class="muc-text">
                    <h2>MENÜ UND CO</h2>
                    <p>Unser Ziel ist es, nicht nur die Zutatenliste eines Rezepts 
                        bereitzustellen, sondern auch den Vitamin- und Nährwertgehalt 
                        transparent zu machen. Dabei legen wir besonderen Wert 
                        auf die Berücksichtigung der Ernährungsbedürfnisse von 
                        Allergikern, die stets im Vordergrund unserer Rezeptentwicklung 
                        stehen.</p>

                </div>
            </div>
        </div>
    </main>
    

    <!-- <div>
        <router-link to="/login">Link zur Login Seite</router-link>
    </div> -->
</body>
</template>


<style scoped>
.test1 {
    z-index: 9999;

}
.test2 {
    position: absolute;
    top: 2100px;
}

.test3 {
    position: absolute;
    top: 2500px;
}

/* Willkommens Text */
.w-text {
    width: 450px;
    padding: 20px;
    position: absolute;
    top: 150px;
    left: 1000px;
}

h1 {
font-size: 36px;
}

p {
font-size: 27px;
}

/* Home Logo (Teller mit Logo)*/
.homelogo {
    position: absolute;
    top: 150px;
    left: 200px;
}

.homeimg {
    width: 800px;
    height: 800px;
}

/* Menü und Co Text */
.muc-text {
    width: 776px;
    padding: 20px;
    position: absolute;
    top: 950px;
    left: 250px;
}

h2 {
    font-size: 32px;
}

/* Hamburger Navigation */
.ham-nav {
    display: none;
}

/* Halbtransparenter Hintergrund für die Texte, bilder usw. */
.semicontainer {
    padding-left: 100px;
    padding-right: 100px;
}

/*-----------------------hier muss noch nachgebessert werden, es soll automatisch wachsen----------   */ 
.semitransparent {
    position: absolute;
    width: 90%;
    height: 1500px ;
    top: 230px;
    left: 100px;
    bottom: 0px;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
    z-index: -1;
}

@media (max-width: 768px) {
    .w-text {
        width: 450px;
        padding: 20px;
        position: absolute;
        top: 711px;
        left: 145px;
    }

    .homelogo {
        position: absolute;
        top: 50px;
        left: 27px;
    }

    .muc-text {
        width: 700px;
        padding: 20px;
        position: absolute;
        top: 1455px;
        left: 18px;
    }

    .homeimg {
    width: 700px;
    height: 700px;
}

    .semicontainer {
        padding-left: 0px;
        padding-right: 0px;
    }

    .semitransparent {
        position: absolute;
        width: 750px;
        height: 1900px ;
        top: 90px;
        left: 15px;
        bottom: 50px;
        border-radius: 30px;
        background-color: rgba(222, 220, 220, 0.81);
        z-index: -1;
    }

    /* Hamburger Navigation */
    .ham-nav {
    display: block;
}

}
</style>