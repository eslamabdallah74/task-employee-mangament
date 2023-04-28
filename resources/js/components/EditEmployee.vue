<template>
    <div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <form @submit.prevent="updateEmployee" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <h1>Edit Employee</h1>
                            <div class="card p-3">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" v-model="name" type="text" class="form-control"
                                        placeholder="Employee Name">
                                    <div v-if="errors.name" class="error">{{ errors.name[0] }}</div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Job ID</label>
                                    <input v-model="jobId" type="number" class="form-control" name="example-text-input"
                                        placeholder="Employee ID">
                                    <div v-if="errors.job_id" class="error">{{ errors.job_id[0] }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hire Date</label>
                                    <div class="row g-2">
                                        <div class="col-5">
                                            <select v-model="month" class="form-select">
                                                <option value="">Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option selected="selected" value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select v-model="day" class="form-select">
                                                <option value="">Day</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20" selected>20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select v-model="year" class="form-select">
                                                <option value="">Year</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989" selected>1989</option>
                                            </select>
                                        </div>
                                        <div v-if="errors.hire_date" class="error">{{ errors.hire_date[0] }}</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlFile1">Image</label>
                                    <div class="image my-2">
                                        <img :src="`/images/${image}`" alt="Employee Image" width="250">
                                    </div>
                                    <input @change="updateEmployeeImage" type="file" class="form-control-file"
                                        id="exampleFormControl">
                                    <div v-if="errors.image" class="error">{{ errors.image[0] }}</div>
                                </div>
                                <div class="my-2">
                                    <button style="margin-right: 1rem;" class="btn btn-bitbucket"
                                        type="submit">Edit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'EditEmployee',
    data() {
        return {
            employee: null,
            name: '',
            jobId: '',
            image: null,
            hireDate: '',
            year: '',
            month: '',
            day: '',
            errors: {},
        };
    },
    methods: {
        fetchEmployee() {
            const employeeId = this.$route.params.id;
            axios.get(`/api/employees/${employeeId}`, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((response) => {
                    this.employee = response.data;
                    this.name = this.employee.name;
                    this.jobId = this.employee.job_id;
                    this.image = this.employee.image;
                    this.hireDate = this.employee.starting_date;

                    const dateObj = new Date(this.hireDate);
                    this.month = dateObj.getMonth() + 1;
                    this.day = dateObj.getDate();
                    this.year = dateObj.getFullYear();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        updateEmployee() {
            const employeeId = this.$route.params.id;

            const formData = {
                name: this.name,
                job_id: this.jobId,
                hire_date: `${this.year}-${this.month}-${this.day}`,
            };
            axios.put(`/api/employees/${employeeId}`, formData)
                .then(() => {
                    this.$router.push('/');
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
        async updateEmployeeImage(event) {
            const employeeId = this.$route.params.id;
            console.log(employeeId)

            const formData = new FormData();
            formData.append('image', event.target.files[0]);
            try {
                const response = await axios.post(`/api/updateImage/${employeeId}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                mounted()
            } catch (error) {
                this.errors = error.response.data.errors;
            }
        },
    },

    mounted() {
        this.fetchEmployee();
    },
};
</script>
