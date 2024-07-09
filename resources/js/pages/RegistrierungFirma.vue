<template>
    <main>
        <div class="r-container">
            <div class="i-container">
                <h3>Entdecken Sie neue Kunden für Ihr Produkt oder Restaurant!</h3>
                <p>Haben Sie ein Produkt, das Sie der Welt präsentieren möchten? 
                    Oder betreiben Sie ein Restaurant, das köstliche Gerichte auch für Allergiker
                     anbietet? Bei uns haben Sie die perfekte Plattform, 
                     um Ihre Produkte oder kulinarischen Genüsse einem breiten
                      Publikum zugänglich zu machen.</p>
                      <p>Warum sollten Sie uns wählen?</p>
                      <ul>
                        <li>Große Reichweite: Erreichen Sie eine Vielzahl neuer Kunden, 
                            die speziell nach Produkten oder Restaurants für Allergiker suchen.</li>
                        <li>Einfache Veröffentlichung: Laden Sie Ihre Informationen hoch und präsentieren Sie sich professionell
                            und ansprechend.</li>
                        <li>Kosteneffizient: Für einen kleinen jährlichen Beitrag von XX CHF erhalten Sie Zugang zu einer wachsenden 
                            Nutzerbasis und potenziellen Kunden.</li>
                      </ul>
                      <p>Unsere Plattform ist der Schlüssel zu Ihrem Erfolg! Treten Sie noch heute 
                        unserem Netzwerk bei und profitieren Sie von einer stetig wachsenden Community
                         von Verbrauchern, die Qualität und Vielfalt zu schätzen wissen.
                    </p>
                    <p>Ihre Rezepte können Sie wieterhin ohne einschrenkungen veröffentlichen.</p>
            </div>

            <div class="registrierung">
                <h3>Registrierung Ihrer Firma</h3>
                <form method="post">
                    <div class="reg-label">
                        <label for="company_name">Firmenname</label>
                        <input type="text" id="company_name" name="company_name" required>
                    </div>

                    <div class="reg-label">
                        <label for="address">Rechnungs Adresse</label>
                        <input type="text" id="address" name="address" required>
                    </div>

                    <div class="reg-label">
                        <label for="zip_code">PLZ</label>
                        <input type="number" id="zip_code" name="zip_code" required>
                    </div>

                    <div class="reg-label">
                        <label for="city">Ort</label>
                        <input type="text" id="city" name="city" required>
                    </div>

                    <div class="reg-label">
                        <label for="company_website">Firmen URL</label>
                        <input type="text" id="company_website" name="company_website" required>
                    </div>

                    <div class="img-container">
                        <p>Firma Logo Hochladen</p>
                        <input type="file" @change="handleFileUpload" accept="image/*">
                        <img :src="imageUrl" alt="Uploaded Image" v-if="imageUrl">
                    </div>



                    <div>
                        <router-link to="/User">
                    <button type="submit"><img src="/public/Assets/img/registrieren-button.png" alt=""></button>
                </router-link>
                </div>
                </form>
            </div>

        </div>
    </main>

</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            passwordConfirm: '',
            // ...
        }
    },
    methods: {
        validateEmail() {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(this.email)) {
                alert('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            }
        },
        validatePassword() {
            if (this.password !== this.passwordConfirm) {
                alert('Die Passwörter stimmen nicht überein.');
            }
        },
        // ...
    }
}
</script>


<style scoped>

/* Halbtransparenter Hintergrund */
main {
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
}

.r-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.i-container {
    background-color: rgba(179, 187, 195, 1);
    width: 390px;
    margin-left: 0px;
    border-radius: 20px;
}

.i-container h3 {
    font-size: 36px;
    font-weight: bold;
    margin-left: 20px;
    padding-top: 20px;
}

.i-container p {
    font-size: 27px;
    margin-left: 20px;
    margin-top: 20px;
    padding-bottom: 20px;
}

.registrierung {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 70px;
    margin-left: 150px;
    margin-bottom: 100px;
    border-radius: 20px;
}

.registrierung h3 {
    font-size: 37px;
    font-weight: bold;
}

.reg-label {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

.reg-label label {
    font-size: 27px;
}

.reg-label input {
    font-size: 25px;
    width: 500px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid rgba(179, 187, 195, 1);
    padding-left: 10px;
}

.check-label {
    display: flex;
    margin-top: 20px;
}

.img-container {
        width: 250px;
        height: 300px;
        background-color: rgba(179, 187, 195, 1);
        border-radius: 25px;
        margin-right: 200px; 
    }

    .img-container img {
        width: 200px;
        aspect-ratio: 4/3;
        object-fit: cover;
        margin: 0 0 0 27px;
        border-radius: 25px;
    }

    .img-container p {
        font-size: 22px;
        text-align: center;
        margin-top: 10px;
    }

button {
    background-color: transparent;
    border: none;
    margin-top: 20px;
}


</style>