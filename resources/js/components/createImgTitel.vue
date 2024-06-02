<template>
    <div class="r-titel">
        <input class="r-box" type="text" placeholder="Rezept Titel eingeben">
    </div>

    <div class="img-container">
        <p>Rezept Bild Hochladen</p>
        <input type="file" @change="handleFileUpload" accept="image/*">
        <img :src="imageUrl" alt="Uploaded Image" v-if="imageUrl">
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            imageUrl: null
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = () => {
                this.imageUrl = reader.result;
            };

            reader.readAsDataURL(file);
        }
    }
};
</script>


<style scoped>
.img-container {
    width: 250px;
    height: 300px;
    background-color: rgba(179, 187, 195, 1);
    border-radius: 25px;
    position: absolute;
    top: 60px;
}

.img-container img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    margin: 0 0 0 27px;
    border-radius: 25px;
}

.img-container p {
    font-size: 22px;
    text-align: center;
    margin-top: 10px;
}

.r-titel {
    position: absolute;
    left: 400px;
    top: 50px;
}

.r-box {
    width: 250px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
}


</style>