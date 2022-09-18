<template>
    <table class="table table-borderless">
        <tr v-for="(account_head) in account_heads">
            <td>{{ account_head.name }}</td>
            <td class="text-end">
                {{ $filters.numberFormat(account_head.total_amounts) }}
            </td>
        </tr>
    </table>
</template>

<script>
export default {
    name : "AccountHead",
    props: ['account_heads']
}
</script>

<style scoped>

</style>
