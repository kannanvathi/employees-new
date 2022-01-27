<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <p>Employees</p>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        mounted() {
            console.log('Index Component mounted.')

            /*this.$router.push({name: 'employee-list'});*/
        }
    }
</script>
