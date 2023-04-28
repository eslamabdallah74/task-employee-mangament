<template>
    <div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <h1>Add Shift for Employee</h1>
                    <div class="alert alert-info">
                        Emplyees with <span class="text-blue">blue</span> means they have shifts already. If you select one, their old shift will be deleted.
                      </div>
                    <form @submit.prevent="addShift">
                        <div class="form-group">
                            <label for="employeeName">Employee Name</label>
                            <select v-model="SelectedEmployee" class="form-control" name="state">
                                <option v-for="employee in employees" :value="employee.id"
                                    :class="{ 'has-shift': employee.shift }">{{ employee.name }} <span v-if="employee.shift"
                                        class="text-blue ml-2">[Has Shift]</span>
                                    </option>

                            </select>
                            <span v-if="errors.employee_id" class="text-danger">{{ errors.employee_id[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="startTime">Start Time</label>
                            <input type="time" class="form-control" id="startTime" v-model="startTime">
                            <span v-if="errors.start_time" class="text-danger">{{ errors.start_time[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="endTime">End Time</label>
                            <input type="time" class="form-control" id="endTime" v-model="endTime">
                            <span v-if="errors.end_time" class="text-danger">{{ errors.end_time[0] }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary my-2">Add Shift</button>
                    </form>
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
            employees: [],
            SelectedEmployee: null,
            startTime: '',
            endTime: '',
            errors: []
        }
    },
    methods: {
        addShift() {
            console.log(this.endTime)
            axios.post('/api/addShift', {
                employee_id: this.SelectedEmployee,
                start_time: this.startTime,
                end_time: this.endTime
            })
                .then(response => {
                    this.SelectedEmployee = null;
                    this.startTime = '';
                    this.endTime = '';
                    this.errors = [];
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        }
    },
    created() {
        axios.get('/api/employees').then((response) => {
            this.employees = response.data;
        });
    },

}
</script>
