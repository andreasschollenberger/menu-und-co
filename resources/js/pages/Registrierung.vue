<template>
    <main>
        <div class="r-container">
            <div class="i-container">
                <h3>Registrierung</h3>
                <p>Für unsere registrierten Benutzer bieten wir noch mehr Möglichkeiten. 
                    Werden Sie Teil unserer Community und erstellen Sie Ihre eigenen Rezepte! 
                    Ihre Kreativität und kulinarischen Fähigkeiten helfen dabei, 
                    unsere Datenbank mit Leben zu füllen.</p>
            </div>

            <div class="registrierung">
                <h3>Registrierung User</h3>
                <form @submit.prevent="registrieren">
                    <div class="reg-label">
                        <label for="first_name">Vorname</label>
                        <input type="text" id="first_name" name="first_name" v-model="first_name" required>
                    </div>

                    <div class="reg-label">
                        <label for="last_name">Familien Name</label>
                        <input type="text" id="last_name" name="last_name" v-model="last_name" required>
                    </div>

                    <div class="reg-label">
                        <label for="email">E-Mail:</label>
                        <input type="email" id="email" name="email" v-model="email" @blur="validateEmail" required>
                    </div>

                    <div class="reg-label">
                        <label for="password">Passwort:</label>
                        <input type="password" id="password" name="password" v-model="password" required>
                    </div>

                    <div class="reg-label">
                        <label for="passwordConfirm">Passwort wiederholen:</label>
                        <input type="password" id="passwordConfirm" name="passwordConfirm" v-model="passwordConfirm" @blur="validatePassword" required>
                    </div>

                    <div class="check-label">
                        <input type="checkbox" id="agb" name="agb" v-model="agb" required>
                        <router-link to="/agb"><label for="agb">AGB Akzeptiert</label></router-link>
                    </div>

                    <div>
                        <!-- <router-link to="/User"> -->
                    <button type="submit"><img src="/public/Assets/img/registrieren-button.png" alt=""></button>
                <!-- </router-link> -->
                </div>
                </form>
            </div>

        </div>
    </main>

</template>

<script>
import AuthService from '../services/AuthService';
export default {
    data() {
        return {
            first_name: '',
            last_name: '',
            agb: false,
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
        async registrieren() {
            const user = {
                first_name: this.first_name,
                last_name: this.last_name,
                agb: this.agb,
                email: this.email,
                password: this.password,
                password_confirmation: this.passwordConfirm
            }
            try {
                await AuthService.registerUser(user);
                this.$router.push('/login');
            } catch (error) {
                console.log(error);
            }
        }
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

button {
    background-color: transparent;
    border: none;
    margin-top: 20px;
}


</style>