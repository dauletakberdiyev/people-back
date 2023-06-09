import {createRouter, createWebHashHistory } from "vue-router";
import Home from "@/views/Home.vue";
import Vacancies from "@/views/Vacancies.vue";
import EmployeeForm from "@/views/EmployeeForm.vue";
import CompanyForm from "@/views/CompanyForm.vue";
import About from "@/views/About.vue";
import Success from "@/views/Success.vue";
import AdminCompany from "@/views/AdminCompany.vue";
import AdminClient from "@/views/AdminClient.vue";
import PdfViewer from "@/views/PdfViewer.vue";
import AdminCompanyEdit from "@/views/AdminCompanyEdit.vue";

const router = createRouter({
    history: createWebHashHistory (),
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
        },
        {
            path: '/admin_page',
            redirect: '/admin_company'
        },
        {
            path: '/admin_company',
            name: 'admin_company',
            component: AdminCompany
        },
        {
            path: '/admin_clients',
            name: 'admin_clients',
            component: AdminClient
        },
        {
            path: '/cilent_cv/:docPath',
            name: 'client_cv',
            component: PdfViewer,
            props: true
        },
        {
            path: '/admin_company/:id',
            name: 'admin_company_edit',
            component: AdminCompanyEdit,
            props: true
        }
    ]
})

export default router

