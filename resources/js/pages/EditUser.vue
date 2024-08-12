<script setup>



</script>

<template>
    <main>
        <div class="r-container">
            <div class="i-container">
                <h3>Editierung Ihres Profils</h3>
                <p>Hat sich etwas an Ihrem Profil verändert? Können Sie es hier problemlos beheben!</p>
            </div>

            <div class="registrierung">
                <h3>Editierung User</h3>
                <form @submit.prevent="updateUser">
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
import { useAuthStore } from '../stores/AuthStore';

const store = useAuthStore();

export default {
    data() {
        return {
            first_name: store.authUser.first_name,
            last_name: store.authUser.last_name,
            email: store.authUser.email,
            // store: useAuthStore(),
        }
    },
    methods: {
        validateEmail() {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(this.email)) {
                alert('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            }
        },

        

        async updateUser() {
            const user = {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
            }
            try {
                await AuthService.updateUser(user);
                await store.getAuthUser();
                this.$router.push('/dashboard');
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