import {createRouter, createWebHistory} from "vue-router";
import Home from "@/views/Home.vue";
import Vacancies from "@/views/Vacancies.vue";
import EmployeeForm from "@/views/EmployeeForm.vue";
import CompanyForm from "@/views/CompanyForm.vue";
import About from "@/views/About.vue";
import Success from "@/views/Success.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/vacancies',
            name: 'vacancies',
            component: Vacancies
        },
        {
            path: '/new_cv',
            name: 'new_cv',
            component: EmployeeForm
        },
        {
            path: '/new_employer',
            name: 'new_employer',
            component: CompanyForm
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/success',
            name: 'success',
            component: Success
        }
    ]
})

export default router

