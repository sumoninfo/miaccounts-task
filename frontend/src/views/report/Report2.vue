<template>
    <h3 class="text-center">Report 2</h3>
    <table class="border-0 table table-bordered">
        <thead>
        <tr>
            <th scope="col">Acc Head id</th>
            <th scope="col">G. Lvl 1</th>
            <th scope="col">G. Lvl 2</th>
            <th scope="col">G. Lvl 3</th>
            <th scope="col">Acc Head</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(list, index) in lists">
            <th scope="row">{{ list.id }}</th>
            <td>{{ list.group_1 }}</td>
            <td>{{ list.group_2 }}</td>
            <td>{{ list.group_3 }}</td>
            <td>{{ list.name }}</td>
            <td>{{ $filters.numberFormat(list.total_amounts) }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import {onMounted, ref} from "vue";
import ApiService       from "../../services/api.service.js";

export default {
    name: "Report1",
    setup() {
        let lists           = ref([])
        let errors          = ref('')
        const getReportData = () => {
            ApiService.get('/report2').then(({data}) => {
                lists.value = data
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
