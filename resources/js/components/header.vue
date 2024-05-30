<script setup>

</script>

<template>

<div>
    <div class="headerimg">
        <img class="headerpic" src="/public/Assets/img/haeder-hintergrund.png" alt="Header Background" />
    </div>
    
    <a href="home">
        <img class="LogoHeader" src="/public/Assets/img/logo.png" alt="Logo" />
    </a>

        <nav class="navigation">
           <a href="home">Home</a>
           <a href="#">Rezepte</a>
           <a href="#">Produkte</a>
           <a href="#">Restaurants</a>
           <a href="#">Tipps</a>
           <a href="#">Über uns</a>
           <a href="#">AGB</a>
        </nav>

        <nav class="loginNav">
            <a href="register">Registrieren</a>
            <a href="login">Login</a>
        </nav>
</div>
</template>

<style scoped>

/* Das ist für den Kochlöffel der als Header benutzt wird */ 
.headerimg {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
}

.headerpic {
    width: 100%;
    padding: 0px 20px 0px 20px;
    position: absolute;
    z-index: -1;
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

.navigation a {
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




    


</style>