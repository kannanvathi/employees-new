<template>

    <div class="card">

        <div class="alert alert-success" v-if="showMessage == true">
            {{msg}}
        </div>
        <p>Employees List</p>

            <form>
                <div class="card-header d-inline-flex align-items-center justify-content-between w-100">
                    <div class="d-inline-flex align-items-center justify-content-start">
                        <input type="search" v-model.lazy="search" name="search" placeholder="Search here.." class="form-control mr-2">
                        <a type="submit" class="btn btn-sm btn-primary">Search</a>
                    </div>

                    <div class="col-md-6">
                        <select
                            class="form-control" v-model="selectedDepartment" name="selected-department" required>
                            <option v-for="department of departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
            </form>
            <router-link
                class="btn btn-sm btn-success mr-2"
                :to="{name: 'EmployeeCreate'}">
                Create
            </router-link>


        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>

                    <th scope="col">address</th>
                    <th scope="col">Department</th>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>


                    <th scope="col">City</th>
                    <th scope="col">Zip code</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Date hired</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="employee in data" :key="employee.id">
                    <td>{{ employee.id }}</td>
                    <td>{{employee.last_name}}</td>
                    <td>{{employee.first_name}}</td>
                    <td>{{employee.middle_name}}</td>
                    <td>{{employee.address}}</td>
                    <td>{{employee.department.name}}</td>
                    <td>{{employee.country.name}}</td>
                    <td>{{employee.state.name}}</td>
                    <td>{{employee.city.name}}</td>
                    <td>{{employee.zip_code}}</td>
                    <td>{{employee.birthdate}}</td>
                    <td>{{employee.date_hired}}</td>
                    <td class="d-inline-flex align-items-center justify-content-start">
                            <router-link
                                class="btn btn-sm btn-success mr-2"
                                :to="{ name: 'EmployeeEdit',
                                        params: {id : employee.id},
                                 }">
                            Edit
                            </router-link>

                        <button
                            @click="deleteEmployee( employee.id)"
                            class="btn btn-sm btn-danger">

                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
    export default {
        name: "IndexComponent",
        data () {
            return {
                data: [],
                msg: '',
                showMessage: false,
                departments: [],
                search: null,
                selectedDepartment: null,
            }
        },
        created() {
            this.getEmployees();
            this.getDepartments();
        },
        watch: {
          search() {
              this.getEmployees();
          },
        selectedDepartment() {
              this.getEmployees();
          }
        },
        methods: {

            getEmployees() {
                console.log(this.search);
                axios.get('/api/employees', {params : {
                    search : this.search,
                    department_id : this.selectedDepartment
                }}).then(
                    res => {
                        this.data = res.data.data
                    }
                ).catch(err => {
                    console.log(err)
                })
            },
            getDepartments() {
                axios.get('/api/employees/departments').
                    then(res => {
                        this.departments = res.data
                        console.log(this.departments)
                })
            },
            deleteEmployee(id){
                axios.delete('api/employees/' + id).then(
                    res => {
                        this.msg = res.data
                        this.showMessage = true
                        this.getEmployees();
                    }
                ).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>

<style scoped>

</style>
