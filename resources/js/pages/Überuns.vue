<template>
<main>
    <div class="aboutus">
        <h1>Über uns</h1>
        <p>Webentwicklung auf höchstem Niveau mit Andreas Schollenberger</p>
        <p>Willkommen! Ich bin Andreas Schollenberger, ein passionierter Web Developer, 
            der kürzlich seine Ausbildung abgeschlossen hat. Diese Webseite, 
            an der ich als Abschlussarbeit gearbeitet habe (Masterpiece), verkörpert meine 
            gesamte Leidenschaft und Expertise im Bereich der Webentwicklung.</p>
       <p>Was sie hier erwartet;</p>
        <ul>
            <li>Technische Brillanz: Diese Webseite ist das Ergebnis meiner umfassenden Ausbildung 
                und Erfahrung im Bereich der Webentwicklung. Jedes Element wurde sorgfältig 
                gestaltet und implementiert, um höchste Standards zu erfüllen.</li>
            <li>Nutzerzentrierter Ansatz: Mein Ziel war es nicht nur, eine Datenbank zu erstellen, 
                die Informationen präsentiert, sondern auch einen echten Mehrwert für die Nutzer zu bieten. 
                Diese Webseite ist darauf ausgerichtet, den Nutzern ein nahtloses und ansprechendes 
                Erlebnis zu bieten.</li>
            <li>Innovation und Kreativität: Sie werden hier nicht nur eine weitere gewöhnliche Webseite 
                finden. Ich habe mein gesamtes Wissen und meine Kreativität eingesetzt, um innovative 
                Funktionen und ein ansprechendes Design zu integrieren.</li>
        </ul>
        <p>Warum diese Webseite besuchen?</p>
        <ul>
            <li>Erleben Sie modernste Webtechnologien in Aktion.</li>
            <li>Nutzen Sie benutzerfreundliche Funktionen, die auf Ihre Bedürfnisse zugeschnitten sind.</li>
            <li>Tauchen Sie ein in ein einzigartiges Online-Erlebnis, das Innovation und Funktionalität vereint.</li>
        </ul>
        <p>Bereit, die Zukunft des Webdesigns zu erkunden? Besuchen Sie jetzt diese Webseite und 
            erleben Sie das Beste aus Design und Technologie!</p>

    </div>

    <div class="kontakt">
        <form>
            <h2>Kontakt</h2>
            <div class="form-group">
                <label for="vorname">Vorname:</label>
                <input type="text" id="vorname" name="vorname" required>
            </div>
            <div class="form-group">
                <label for="nachname">Familienname:</label>
                <input type="text" id="nachname" name="nachname" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail Adresse:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-nachricht">
                <label for="nachricht">Nachricht:</label>
                <textarea id="nachricht" name="nachricht" required></textarea>
            </div>
            <button type="submit"><img src="/public/Assets/img/e-mail.png" alt=""></button>
        </form>
    </div>
</main>>

</template>


<style scoped>

/* über uns text */
.aboutus {
    margin: 50px 100px 50px 100px;
    background-color: rgba(179, 187, 195, 1);
    border-radius: 30px;
    padding: 50px 50px 50px 50px;
}

.aboutus h1 {
    font-size: 40px;
    margin-bottom: 20px;
}

.aboutus p {
    font-size: 27px;
    margin-bottom: 20px;
}

.aboutus ul {
    font-size: 27px;
    margin-bottom: 20px;
}

/* Kontaktformular */
.kontakt {
    margin: 50px 100px 50px 100px;
    background-color: rgba(179, 187, 195, 1);
    border-radius: 30px;
    padding: 50px 50px 50px 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 70px;
    margin-left: 150px;
    margin-bottom: 100px;
    border-radius: 20px;
}

.form-group {
    margin-bottom: 20px;
    font-size: 27px;
}

.form-group input {
    width: 80%;
    height: 40px;
    font-size: 27px;
    margin-top: 10px;
}

.form-group label {
    left: 10px;
}

.form-nachricht {
    margin-bottom: 20px;
    font-size: 27px;
}

.form-nachricht textarea {
    width: 80%;
    height: 200px;
    font-size: 27px;
    margin-top: 10px;
}

button {
    background-color: transparent;
    border: none;
    margin-top: 20px;
}
   
</style>