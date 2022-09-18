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
            <td>{{ list.name }}</td>
                <ChildGroup class_name="table table-bordered" v-if="list.childrens.length>0" :childrens="list.childrens" />
<!--                <span v-if="list.childrens.length>0">{{ list.childrens[0].name}}</span>-->

            <td>

                <span v-if="list.childrens.length>0 && list.childrens[0].childrens.length>0">{{ list.childrens[0].childrens[0].name}}</span>
            </td>
            <td>
                <AccountHead class_name="table table-bordered" v-if="list.childrens.length>0 && list.childrens[0].childrens.length>0" :account_heads="list.childrens[0].childrens[0].account_heads"/>
             </td>
            <td>{{ list.total_amounts }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import {onMounted, ref} from "vue";
import ApiService       from "../../services/api.service.js";
import AccountHead      from "../../components/AccountHead.vue";
import ChildGroup       from "../../components/ChildGroup.vue";

export default {
    name: "Report1",
    components: {ChildGroup, AccountHead},
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
