<script>
    export default {
        head() {
            return {
                title: 'Vielen Dank für Ihre Nachricht!',
                meta: [
                    {
                        hid: 'description',
                        name: 'description',
                        content: 'Vielen Dank für Ihre Nachricht! Wir werden uns so schnell wie möglich bei Ihnen melden.'
                    }
                ]
            }
        }
    }
</script>

<template>
    <main>
        <div class="thx">
            <h2>Vielen Dank für Ihre Nachricht!</h2>
            <p>Wir werden uns so schnell wie möglich bei Ihnen melden.</p>
        </div>
        <div class="button">
            <router-link to="/über-uns">
                <button class="ansicht">Zurück</button>
            </router-link>
        </div>
    </main>
</template>


<style scoped>
    .thx {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 150px;
    }

    main {
        background-color: rgba(179, 187, 195, 1);
        width: 30%;
        border-radius: 10px;
        margin: 0 auto;
    }

    .button {
    display: flex;
    padding-bottom: 20px;
    justify-content: center;
}


.ansicht{
    width: 200px;
    height: 50px;
    background-color: #393636;
    color: white;
    font-size: 20px;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
    margin-right: 10px;
}

button:hover {
    background-color: #555555;
    color: yellowgreen;
    cursor: pointer;
}


</style>