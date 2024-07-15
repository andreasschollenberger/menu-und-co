<template>
<template>
    <div>
        <h1>Login</h1>
        <form @submit="login">
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" v-model="password" required>
            <button type="submit">Login</button>
        </form>
        <button @click="logout">Logout</button>
        <button @click="goToDashboard">Go to Dashboard</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        login() {
            // Perform login logic here
            // Use this.email and this.password to access the entered values
        },
        logout() {
            // Perform logout logic here
        },
        goToDashboard() {
            // Navigate to the dashboard page
        }
    }
};
</script>

<style scoped>

</style>