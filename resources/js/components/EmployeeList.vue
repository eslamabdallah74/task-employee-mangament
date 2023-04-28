<template>
    <div>
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Employees
                            </h2>
                            <div v-if="message" class="alert alert-info my-2">{{ message }}</div>
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
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Shift Schedule</th>
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
                                                    <button class="btn btn-primary" @click="checkIn(employee.id)">Check
                                                        In</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning" @click="checkOut(employee.id)">Check
                                                        Out</button>
                                                </td>
                                                <td>
                                                    <router-link :to="{ name: 'shiftSchedule', params: { id: employee.id } }">
                                                        Visit Employee Shift Schedule
                                                    </router-link>
                                                </td>
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
            message: '',
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
        },
        async checkIn(employeeId) {
            await axios.post(`/api/check_in/${employeeId}`)
                .then(response => {
                    this.message = response.data.message;
                })
                .catch(error => {
                    this.message = error.response.data.message;
                });
        },
        async checkOut(employeeId) {
            await axios.post(`/api/check_out/${employeeId}`)
                .then(response => {
                    this.message = response.data.message;
                })
                .catch(error => {
                    this.message = error.response.data.message;
                });
        },

    }
};

</script>
