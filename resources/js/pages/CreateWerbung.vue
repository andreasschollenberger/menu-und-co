<template>
    <main>
        <div class="registrierung">
                <h3>Entwikeln Sie Ihre Werbung</h3>
                <form method="post">
                    <div class="reg-label">

                        <div class="reg-label">
                            <label for="discription">Werbetext für Ihr Produkt</label>
                            <input type="text" id="discription" name="discription">
                        </div>

                        <div class="reg-label">
                            <label for="discription">Werbetext für Ihr Restaurant</label>
                            <input type="text" id="discription" name="discription">
                        </div>

                        <div class="reg-label">
                            <label for="url">Produkt URL</label>
                            <input type="text" id="url" name="url">
                        </div>

                        <label for="type">Wählen Sie zwischen</label>
                        <div>
                            <input type="radio" id="product" name="type" value="product">
                            <label for="product">Produkt</label>
                        </div>
                        <div>
                            <input type="radio" id="restaurant" name="type" value="restaurant">
                            <label for="restaurant">Restaurant</label>
                        </div>
                    </div>
                    <div class="img-container">
                        <p>Produkt Bild Hochladen</p>
                        <input type="file" @change="handleFileUpload" accept="image/*">
                        <img :src="imageUrl" alt="Uploaded Image" v-if="imageUrl">
                    </div>


                    <div>
                        <router-link to="/User">
                            <button type="submit"><img src="/public/Assets/img/senden-bnt.png" alt=""></button>
                        </router-link>
                    </div>
                </form>
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