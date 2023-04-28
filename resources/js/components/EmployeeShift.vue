<template>
    <div>
        <h1>Add Shift for Employee</h1>
        <form>
            <div class="form-group">
                <label for="employeeName">Employee Name</label>
                <input type="text" class="form-control" id="employeeName" v-model="employeeName">
            </div>
            <div class="form-group">
                <label for="startTime">Start Time</label>
                <input type="time" class="form-control" id="startTime" v-model="startTime">
            </div>
            <div class="form-group">
                <label for="endTime">End Time</label>
                <input type="time" class="form-control" id="endTime" v-model="endTime">
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="addShift">Add Shift</button>
        </form>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            employeeName: '',
            startTime: '',
            endTime: ''
        }
    },
    methods: {
        addShift() {
            axios.post('/api/employees/add-shift', {
                employeeName: this.employeeName,
                startTime: this.startTime,
                endTime: this.endTime
            })
                .then(response => {
                    // Handle success
                })
                .catch(error => {
                    // Handle error
                });
        }

    }
}
</script>
  