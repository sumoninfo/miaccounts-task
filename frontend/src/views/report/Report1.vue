<template>
    <h3 class="text-center">Report 1</h3>
    <table class="table table-borderless">
        <thead class="border-bottom">
        <tr>
            <th scope="col">Group</th>
            <th scope="col">Group/Heads</th>
            <th scope="col">Total Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(list, index) in lists">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ list.name }}</td>
            <td>{{ list.total_amounts }}</td>
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
