<template>
    <div>
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Tables
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Job ID</th>
                                                <th>Work starting date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Foreach -->
                                            <tr v-for="employee in employees" :key="employee.id">
                                                <td>
                                                    <img :src="`/images/${employee.image}`" alt="Employee Image" width="50">
                                                </td>
                                                <td>{{ employee.name }}</td>
                                                <td>#{{ employee.job_id }}</td>
                                                <td>{{ employee.starting_date }}</td>
                                                <td>
                                                    <router-link
                                                        :to="{ name: 'editEmployee', params: { id: employee.id } }">
                                                        <span class="btn btn-cyan">
                                                            Edit
                                                        </span>
                                                    </router-link>

                                                </td>
                                                <td>
                                                    <button class="btn btn-danger"
                                                        @click="deleteEmployee(employee.id)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    name: 'EmployeeList',
    data() {
        return {
            employees: [],
        };
    },
    created() {
        axios.get('/api/employees').then((response) => {
            this.employees = response.data;
        });
    },
    methods: {
        async deleteEmployee(employeeId) {
            if (window.confirm('Are you sure you want to delete this employee?')) {
                try {
                    await axios.delete(`/api/employees/${employeeId}`);
                    this.employees = this.employees.filter((employee) => employee.id !== employeeId); // refresh
                } catch (error) {
                    console.error(error);
                }
            }
        }
    }
};

</script>
