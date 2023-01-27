<template>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input v-model="user.username" class="input-control"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input v-model="user.password" class="input-control"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            user: {
                username: 'admin',
                password: '123456'
            }
        }
    }
}
</script>

<style scoped>

</style>
