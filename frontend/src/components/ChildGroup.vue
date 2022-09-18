<template>
    <table class="table table-borderless">
        <tr v-for="(children) in childrens">
            <td>{{ children.name }}</td>
            <AccountHead :account_heads="children.account_heads"/>
            <ChildGroup :childrens="children.childrens"/>
        </tr>
    </table>
</template>

<script>
import AccountHead from "./AccountHead.vue";

export default {
    name      : "ChildGroup",
    components: {AccountHead},
    props     : ['childrens']
}
</script>

<style scoped>

</style>
