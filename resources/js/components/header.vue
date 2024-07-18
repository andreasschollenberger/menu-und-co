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

<div>
    <div class="headerimg">
        <img class="headerpic" src="/public/Assets/img/haeder-hintergrund.png" alt="Header Background" />
    </div>
    
    <router-link to="/">
        <img class="LogoHeader" src="/public/Assets/img/logo.png" alt="Logo" />
    </router-link>

        <nav class="navigation">
            <router-link to="/">Home</router-link>
            <router-link to="/rezepte">Rezepte</router-link>
            <router-link to="/produkte">Produkte</router-link>
            <router-link to="/restaurants">Restaurants</router-link>
            <router-link to="/tipps">Tipps</router-link>
            <router-link to="/über-uns">Über uns</router-link>
            <router-link to="/agb">AGB</router-link>
        </nav>

        
        <nav class="loginNav">
            <div v-if="store.authUser == null">
                <router-link to="/registrierung">Registrieren</router-link>
            </div>
        
            <div class="user" @change="onChange($event)">

                <div v-if="store.authUser == null">
                    <router-link to="/login">Login</router-link>
                </div>

                <div v-if="store.authUser != null">
                    <router-link to="/dashboard">Profil</router-link>
                </div>

                <div v-if="store.authUser != null">
                    <router-link to="/login">Logout</router-link>
                </div>
                        
            </div> 
        
        </nav>
</div>
</template>

<script>

export default {
  methods: {
    onChange(event) {
      const path = event.target.value;
      if (path) {
        this.$router.push(path);
      }
    }
  }
}
</script>


<style scoped>

/* Das ist für den Kochlöffel der als Header benutzt wird */ 
.headerimg {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
}

.headerpic {
    width: 97%;
    padding: 0px 20px 0px 20px;
}

/* Logo auf dem Kochlöffel */ 
.LogoHeader {
    width: 290px;
    height: 151px;
    position: absolute;
    z-index: 1;
    top: 10px;
    left: 60px;
}

/* Navigations leiste */
.navigation {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70px;
    position: absolute;
    z-index: 1;
    width: 100%;
    top: 0;
}

.navigation a{ 
    text-decoration: none;
    font-family: "Lexend Deca", sans-serif;
    font-size: 26px;
    color: white;
    margin-right: 15px;
}

.navigation a:hover {
        color: rgb(133, 121, 121);
    }


/* Login Navigation */
.loginNav {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: absolute;
    z-index: 1;
    top: 100px;
    right: 440px;
}

.loginNav a {
    text-decoration: none;
    font-family: "Lexend Deca", sans-serif;
    font-size: 26px;
    color: white;
    margin-bottom: 10px;
}

.loginNav a:hover {
    color: rgb(133, 121, 121);
}

.user {
    width: 100px;
    height: 30px;
    margin-right: 20px;
    margin-bottom: 20px;
    font-size: 16px;
    text-align: center;
    line-height: 28px;
}

.pass {
    width: 200px;
    height: 30px;
    margin-right: 20px;
    margin-bottom: 20px;
    font-size: 16px;
    text-align: center;
    line-height: 28px;
}

@media (max-width: 1406px) {

    
    .navigation a {
        font-size: 20px;
    }

    .loginNav {
        top: 55px;
        right: 380px;
    }

    .loginNav a {
        font-size: 20px;
    }

    .LogoHeader {
        width: 200px;
        height: 100px;
        position: absolute;
        z-index: 1;
        top: 5px;
        left: 50px;
    }
}

@media (max-width: 768px) {
    .navigation {
        display: none;
    }
    .loginNav {
        top: 5px;
        right: 480px;
    }

    .loginNav a{
        font-size: 15px;
        
    }

    .LogoHeader {
        width: 120px;
        height: 70px;
        position: absolute;
        z-index: 1;
        top: 1px;
        left: 50px;
    }

    .headerimg {
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
    }

    .headerpic {
        width: 97%;
        padding: 0px 20px 0px 20px;
        position: absolute;
        z-index: -1;
    }
}


    


</style>