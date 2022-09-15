<template>
    <div class="d-flex justify-content-center">
        <router-link :to="{name:'Report1'}" type="button" class="btn btn-primary me-2">Report 1</router-link>
        <router-link :to="{name:'Report2'}" type="button" class="btn btn-primary">Report 2</router-link>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>

</style>
