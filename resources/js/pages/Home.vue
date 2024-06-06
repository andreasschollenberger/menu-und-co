<script setup>
import hamburger from '../components/hamburger.vue';

</script>
<template>
    <div>
        <header>

            <div class="ham-nav">
                <hamburger />
            </div>

        </header>
    </div>
    <main>
        <div class="h-container">

            <div class="i-container">
                <div class="homelogo">
                    <img class="homeimg" src="/public/Assets/img/homelogo.png" alt="Home Logo" />
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
            </div> 
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
    </main>
    

    <!-- <div>
        <router-link to="/login">Link zur Login Seite</router-link>
    </div> -->
</template>


<style scoped>

/* Halbtransparenter Hintergrund */
main {
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
}

.h-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.i-container {
    display: flex;

}

/* Home Logo (Teller mit Logo)*/
.homelogo {
    margin-top: 50px;
    margin-left: 0px;
}

.homeimg {
    width: 800px;
    height: 800px;
}



/* Willkommens Text */
.w-text {
    width: 445px;
    padding: 20px;
    margin-top: 100px;
}

.w-text h1  {
font-size: 36px;
}

.w-text p {
font-size: 27px;
}

/* Menü und Co Text */

.muc-text {
    width: 776px;
    padding: 0px 0px 50px 50px;
    
}

.muc-text h2 {
    font-size: 32px;
}

.muc-text h1 {
    font-size: 36px;
}

.muc-text p {
    font-size: 27px;
}


/* Hamburger Navigation */
.ham-nav {
    display: none;
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