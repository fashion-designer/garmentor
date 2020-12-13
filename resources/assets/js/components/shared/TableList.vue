<template>
    <div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th class="text-center">Verified</th>
                <th class="text-center">Active</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td>{{ item.first_name }} {{ item.last_name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.country_code}} {{ item.phone}}</td>
                <td class="text-center"> {{ item.is_verified }} </td>
                <td class="text-center"> {{ item.is_active }} </td>
                <td class="text-center">
                    <a class="btn btn-info btn-sm" href="#">Edit</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        name: "TableList",
        props: {
            items: {
                type: Array,
                default: []
            }
        }
    }
</script>

<style scoped>

</style>