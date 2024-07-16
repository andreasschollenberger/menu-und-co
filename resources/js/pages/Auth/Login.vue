<script setup>
import { useAuthStore } from '@/stores/AuthStore';
import AuthService from "@/services/AuthService";
import {ref} from 'vue';
import {useRouter} from 'vue-router';

const router = useRouter();
const store = useAuthStore();
console.log(store.authUser);

const user = ref({
    email : '',
    password : ''
});


const login = async() => {

    try {

        await AuthService.login(user.value);

        const authUser = await store.getAuthUser();

        if(authUser) {
          router.push("/dashboard");
        }
        else {
            console.log('error');
        }
      } catch (error) {
        console.log(error);
      }
}

</script>

<template>

    <main>
        <form  v-if="store.authUser == null" class="log-container" action="" method="post" @submit.prevent="login">

            <h1>Login</h1>
            <div class="reg-label">
                <label for="">E-Mail</label>
                <input type="email" name="email" v-model="user.email">
            </div>

            <div class="reg-label">
                <label for="">Passwort</label>
                <input type="password" name="password" v-model="user.password">
            </div>

            <button class="login-bnt" type="submit">Login</button>
        </form>

        <div v-else class="bnt">
            <!-- <div class="bnt"> -->
            <h2>Bitte klicken Sie auf 'Logout', um sich abzumelden.</h2>
                
            <button  class="logout-bnt" @click="logout">Logout</button>
            

            <router-link to="/user">
                <button class="dash-bnt">User Seite</button>
            </router-link>
        </div>  

    </main>

</template>

<style scoped>

main {
    max-width: 90%;
    margin: auto;
    border-radius: 30px;
    background-color: rgba(222, 220, 220, 0.81);
}

.log-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;
}

.log-container h1 {
    font-size: 40px;
    text-align: center;
    margin-top: 20px;
}

.log-container button {
    margin-bottom: 50px;
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

.login-bnt {
    font-size: 25px;
    width: 200px;
    height: 40px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    margin-top: 20px;
}

.bnt {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    padding-bottom: 50px;
    
}


.logout-bnt {
    font-size: 25px;
    width: 200px;
    height: 40px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    margin-top: 20px;
}

.dash-bnt {
    font-size: 25px;
    width: 200px;
    height: 40px;
    border-radius: 5px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    margin-top: 20px;
}

</style>
 
