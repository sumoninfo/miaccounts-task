<template>
    <table :class="class_name">
        <tr v-for="(children) in childrens">
            <td class="align-baseline">{{ children.name }}</td>
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
    props     : {
        childrens       : {type: Array},
        class_name  : {default: 'table table-borderless'},
    },
}
</script>

<style scoped>

</style>
