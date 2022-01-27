import VueRouter from "vue-router";
import IndexComponent from "./components/employees/IndexComponent.vue";
import CreateComponent from "./components/employees/CreateComponent.vue";
import EditComponent from "./components/employees/EditComponent.vue";
const router = new VueRouter({
    mode: 'history',
        routes: [
            {
                path: '/employees',
                component: IndexComponent,
                name: 'EmployeeList',
            },
            {
                path: '/create',
                component: CreateComponent,
                name: 'EmployeeCreate',
            },
            {
                path: '/edit/:id',
                component: EditComponent,
                name: 'EmployeeEdit',
            }

        ]
})

export default router;
