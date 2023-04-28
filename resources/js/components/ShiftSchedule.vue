<template>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Foreach -->
                                    <tr v-for="attendance in attendances" :key="attendance.id">
                                        <td>{{ attendance.status }}</td>
                                        <td>{{ attendance.datetime }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios';
export default {
    data() {
        return {
            employeeId: null,
            attendances: []
        }
    },
    created() {
        this.employeeId = this.$route.params.id;
        this.fetchAttendances();
    },
    methods: {
        fetchAttendances() {
            axios.get(`/api/attendances/${this.employeeId}`)
                .then(response => {
                    this.attendances = response.data
                })
                .catch(error => {
                    console.error(error)
                })
        }
    }
}
</script>
  