<script setup>
import headerpic from '../components/header.vue';

</script>
<template>
<body>
    <div>
        <header>
            <headerpic />
        </header>
    </div>
    <main>
        <div class="semicontainer">
            <div class="semitransparent">
                <div class="w-text">
                    <h1>Willkommen bei unserer Rezepte-Plattform!</h1>
                    <p>Als Gast haben Sie die Möglichkeit, alle unsere köstlichen Rezepte und nützlichen Informationen einzusehen und auszuprobieren. Tauchen Sie ein in die Welt des Kochens und entdecken Sie eine Vielzahl von Gerichten für jeden Geschmack.</p>
                    <p>Für unsere registrierten Benutzer bieten wir noch mehr Möglichkeiten. Werden Sie Teil unserer Community und erstellen Sie Ihre eigenen Rezepte! Ihre Kreativität und kulinarischen Fähigkeiten helfen dabei, unsere Datenbank mit Leben zu füllen.</p>
                </div>
                <div class="Homelogo">
                    
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
/* Willkommens Text */
.w-text {
    width: 353px;
    padding: 20px;
    position: absolute;
    top: 150px;
    left: 1000px;
}

h1 {
font-size: 25px;
}

p {
font-size: 20px;
}

.semicontainer {
        padding-left: 100px;
        padding-right: 100px;
    }

    .semitransparent {
        position: absolute;
        width: 90%;

        top: 230px;
        left: 100px;
        bottom: 0px;
        border-radius: 30px;
        background-color: rgba(222, 220, 220, 0.81);
        z-index: -1;
    }

</style>