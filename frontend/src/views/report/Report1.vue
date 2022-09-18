<template>
    <h3 class="text-center">Report 1</h3>
    <table class="table table-borderless">
        <thead class="border-bottom">
        <tr>
            <th scope="col">Group Group/Heads</th>
            <th scope="col" class="text-end">Total Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(list, index) in lists">
            <td>{{ list.name }}</td>
            <AccountHead :account_heads="list.account_heads"/>
            <ChildGroup :childrens="list.childrens"/>
        </tr>
        </tbody>
    </table>
</template>

<script>
import {onMounted, ref} from "vue";
import ApiService       from "../../services/api.service.js";
import ChildGroup       from '../../components/ChildGroup.vue'
import AccountHead      from "../../components/AccountHead.vue";
export default {
    name: "Report1",
    components: {AccountHead, ChildGroup},

    setup() {
        let lists           = ref([])
        let errors          = ref('')
        const getReportData = () => {
            ApiService.get('/report').then(({data}) => {
                lists.value = data.data
            }).catch(error => {
                errors.value = error.response.data.errors;
            });
        }
        onMounted(() => {
            getReportData()
        })
        return {
            lists,
            getReportData
        }
    }
}
</script>

<style scoped>

</style>
