<template>
    <div>
        <form method="post" action="#">
            <div class="app-title">
                <h1 style="margin-bottom: 10px"><i class="fas fa-id-card"></i> Admins Profile</h1>
                <span class="pull-right">
                    <button type="button" class="btn btn-info" @click.prevent="returnToPreviousRoute">Back</button>
                </span>
            </div>
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-6 garmentor-m-r-3 garmentor-p-6 border-radius-5 background-white">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ profileData.first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>{{ profileData.last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ profileData.email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ profileData.country_code }} {{ profileData.phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Active</td>
                                        <td>{{ profileData.is_active }}</td>
                                    </tr>
                                    <tr>
                                        <td>Verified</td>
                                        <td>{{ profileData.is_verified }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-3 garmentor-m-r-6 garmentor-p-6 border-radius-5 background-white">
                        <div class="card">
                            <div class="card-body">
                                <div class="border rounded-lg text-center garmentor-p-6">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import { get as _get } from "lodash";

    export default {
        name: "ViewProfile",
        props: {
            getProfileRoute: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                profileId: null,
                profileData: {}
            };
        },
        async mounted() {
            await this.fetchProfileInfo();
        },
        methods: {
            async fetchProfileInfo() {
                this.profileId = this.$route.params.id;
                const getProfileRoute = `${this.getProfileRoute}/${this.profileId}`;

                axios.get(getProfileRoute)
                    .then(response => {
                        this.profileData = _get(response, 'data');
                    });
            },
            returnToPreviousRoute() {
                return this.$router.go(-1);
            }
        }
    }
</script>

<style scoped>

</style>