<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 d-flex flex-column">
        <!-- Brand Logo -->
        <router-link :to="'/'" class="brand-link">
            <img src="/assets/images/logo_dark.png" alt="PeoplePro logo" class="brand-image" style="opacity: .8">
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2 p-0">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link :to="'/admin_company'" class="nav-link d-flex">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{$t('admin.companies')}}
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="'/admin_clients'" class="nav-link d-flex">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                {{$t('admin.clients')}}
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                {{$t('admin.responses')}}
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
export default {
    name: "Admin"
}
</script>

<style scoped>

</style>
