<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link :to="{name:'HomePage'}" class="navbar-brand" href="#">Miaccounts</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link :to="{name:'Report1'}" class="nav-link" href="#">Report 1</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'Report2'}" class="nav-link" href="#">Report 2</router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <router-view/>
    </div>
</template>

<script>
export default {
    name: "Layout"
}
</script>

<style scoped>

</style>
