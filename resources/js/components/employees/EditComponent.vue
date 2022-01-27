<template>
    <div class="card">
        <div class="card-header">
            <p>Edit Employee</p>
            <button class="btn btn-sm btn-success mr-2">
                <router-link
                    :to="{ name: 'EmployeeList' }"
                >
                    Back
                </router-link>
            </button>
        </div>

        <div class="card-body">
            {{formData}}
            <form @submit.prevent="updateEmployee()" >
                <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                    <div class="col-md-6">
                        <input id="last_name" v-model="formData.last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="username" autofocus>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                    <div class="col-md-6">
                        <input id="first_name" v-model="formData.first_name" type="text" class="form-control" name="first_name" value="" required autocomplete="first_name" autofocus>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                    <div class="col-md-6">
                        <input id="middle_name" type="text" v-model="formData.middle_name" class="form-control" name="middle_name" value="" required autocomplete="middle_name" autofocus>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                    <div class="col-md-6">
                        <input id="address" v-model="formData.address" type="text" class="form-control" name="address" value="" required autocomplete="address" autofocus>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Department</label>
                    <div class="col-md-6">
                        <select class="form-control" v-model="formData.department_id" name="department_id" required >
                            <option v-for="department of departments" :key="department.id" :value="department.id">{{department.name}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Country</label>
                    <div class="col-md-6">
                        <select
                            @change="getStates()"
                            class="form-control" v-model="formData.country_id" name="country_id" required >
                            <option v-for="country of countries" :key="country.id" :value="country.id">{{country.name}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">State</label>
                    <div class="col-md-6">
                        <select
                            @change="getCities()"
                            class="form-control" v-model="formData.state_id" name="city_id" required >
                            <option v-for="state of states" :key="state.id" :value="state.id">{{state.name}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="col-md-6">
                        <select class="form-control" v-model="formData.city_id" name="city_id" required >
                            <option v-for="city of cities" :key="city.id" :value="city.id">{{city.name}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Zip Code</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" v-model="formData.zip_code" name="zip_code" required >

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Birth Date</label>
                    <div class="col-md-6">

                        <datepicker v-model="formData.birthdate" input-class="form-control" name="birthdate"></datepicker>

                        <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Date Hired</label>
                    <div class="col-md-6">
                        <datepicker v-model="formData.date_hired" input-class="form-control" name="date_hired"></datepicker>
                        <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import moment from 'moment';
    import Datepicker from 'vuejs-datepicker';
    export default {
        name: "EditComponent",
        components: {
            Datepicker
        },
        data() {
            return {
                state : {
                    date: new Date(2016, 9,  16)
                },
                hired : {
                    date: new Date(2016, 9,  16)
                },
                countries: [],
                states: [],
                cities: [],
                departments: [],

                formData: {
                    first_name: '',
                    last_name: '',
                    middle_name: '',
                    address: '',
                    department_id: '',
                    country_id: '',
                    state_id: '',
                    city_id: '',
                    zip_code: null,
                    birthdate: null,
                    date_hired: null
                },
                submitData: {},
            }
        },
        mounted() {
            this.getCountry();
            this.getDepartments();
            this.getEmployee();
        },
        methods: {
            getEmployee() {
                axios.get('/api/employees/' + this.$route.params.id).
                then(res => {
                        this.formData = res.data.data
                        this.getStates()
                        this.getCities()
                }
                )
            },
            getCountry(){
                axios.
                get('/api/employees/countries').then( res => {
                    this.countries = res.data
                })
            },
            getStates(){
                axios.
                get('/api/employees/' + this.formData.country_id + '/states').then( res => {
                    this.states = res.data
                    console.log(this.states);
                })
            },
            getCities(){
                axios.
                get('/api/employees/' + this.formData.state_id + '/cities').then( res => {
                    this.cities = res.data
                    c
                })
            },
            getDepartments(){
                axios.
                get('/api/employees/departments').then( res => {
                    this.departments = res.data
                })
            },
            updateEmployee() {
                this.submitData = {
                    first_name: this.formData.first_name,
                    last_name: this.formData.last_name,
                    middle_name: this.formData.middle_name,
                    address: this.formData.address,
                    department_id: this.formData.department_id,
                    country_id: this.formData.country_id,
                    state_id: this.formData.state_id,
                    city_id: this.formData.city_id,
                    zip_code: this.formData.zip_code,
                    birthdate: this.formatDate(this.formData.birthdate),
                    date_hired: this.formatDate(this.formData.date_hired),
                }

                axios.
                put('/api/employees/' + this.$route.params.id, this.submitData)
                    .then(res => {
                        this.$router.push({ name: "EmployeeList" });

                    })
                    .catch(error => {

                    })

            },
            formatDate(value) {
                if(value){
                    return moment(String(value)).format("YYYYMMDD");
                }
            }
        },
    }
</script>

<style scoped>

</style>
