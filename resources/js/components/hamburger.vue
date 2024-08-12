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
    <label class="ham">
        <input type="checkbox">
        <div class="toggle">
            <span class="top_line common"></span>
            <span class="middle_line common"></span>
            <span class="bottom_line common"></span>
        </div>

        <div class="slide">
            <h1>MENU</h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/rezepte">Rezepte</a></li>
                <li><a href="/produkte">Produkte</a></li>
                <li><a href="/restaurants">Restaurants</a></li>
                <li><a href="/tipps">Tipps</a></li>
                <li><a href="/über-uns">Über uns</a></li>
                <li><a href="/agb">AGB</a></li>
            </ul>

            <nav class="loginNav">
            <div v-if="store.authUser == null">
                <router-link to="/registrierung">Registrieren</router-link>
            </div>
        
            <!-- <div class="user" @change="onChange($event)"> -->

                <div v-if="store.authUser == null">
                    <router-link to="/login">Login</router-link>
                </div>

                <div v-if="store.authUser != null">
                    <router-link to="/dashboard">Profil</router-link>
                </div>

                <div v-if="store.authUser != null">
                    <router-link to="/login">Logout</router-link>
                </div>
                        
            <!-- </div>  -->
        
        </nav>
            
        </div>
    </label>

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

.ham {
        display: none;
    }


@media (max-width: 390px) {
    .ham {
        display: block;
    }


    .slide {
        height: 100%;
        width: 180px;
        position: absolute;
        background-color: #595656;
        transition: 0.5s ease;
        transform: translateX(-180px);
        opacity: 95%;
    }

    h1 {
        color: white;
        font-weight: 800;
        text-align: right;
        padding: 10px 0;
        padding-right: 43px;
        pointer-events: none;
    }

    ul li {
        list-style: none;
    }

    ul li a {
        color: rgb(196, 183, 181);
        font-weight: 500;
        padding: 5px 0;
        display: block;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.2s ease-out;
    }

    ul li:hover a {
        color: white;
        background-color: #4e4a4a;

    }

    input {
        display: none;
        visibility: hidden;
        -webkit-appearance: none;
        appearance: none; /* Hides the default checkbox */
    }

    .toggle {
        position: absolute;
        height: 25px;
        width: 25px;
        top: 6px;
        left: 18px;
        z-index: 2;
        cursor: pointer;
        border-radius: 2px;
        background-color: rgba(255, 255, 255, 0.7);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .toggle .common {
        position: absolute;
        height: 2px;
        width: 20px;
        background-color: #333;
        border-radius: 50px;
        transition: 0.3s ease;
    }

    .toggle .top_line {
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .toggle .middle_line {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .toggle .bottom_line {
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    input:checked ~ .toggle .top_line {
        left: 1px;
        top: 12px;
        width: 25px;
        transform: rotate(45deg);
    }

    input:checked ~ .toggle .bottom_line {
        left: 1px;
        top: 12px;
        width: 25px;
        transform: rotate(-45deg);
    }

    input:checked ~ .toggle .middle_line {
        opacity: 0;
        transform: rotate(20px);
    }

    input:checked ~ .slide {
        transform: translateX(0);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .loginNav {
        /* position: absolute;
        top: 375px;
        left: 66px;
        transform: translate(-50%, -50%);
        text-decoration: none; */
        padding-left: 40px;
        
    }


    .loginNav a {
        color: rgb(196, 183, 181);
        font-weight: 500;
        padding: 5px 0;
        display: block;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.2s ease-out;
}

    
}



</style>