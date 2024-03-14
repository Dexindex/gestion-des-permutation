<?php require('./templates/head-section.php');
headSection("Ajouter toner");









?>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
    <?php include('./templates/loader.php') ?>
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <?php require('./templates/sidebar.php');
        sidebar("toners") ?>
        <div class="main-content flex min-h-screen flex-col">
            <?php include('./templates/header.php') ?>
            <div class="animate__animated p-6" style="z-index: 2;" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="./" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                           <a href="./toners" class="text-primary hover:underline"> <span>Produits | Toners</span></a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Ajouter</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">
                        <a href="./toners" class="btn btn-primary mr-2" @click="toggle">
                            Annuler <box-icon class="ml-2" color="white"  name='arrow-back'></box-icon>
                        </a>

                    </div>
                    <div class="panel mt-6">
                        
                    </div>
                </div>
                <!-- end main content section -->
            </div>

            <?php include('./templates/footer.php') ?>
        </div>
    </div>

    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./assets/vendor/dataTables.min.js"></script>



    <script defer src="assets/js/apexcharts.js"></script>







    <?php require('./templates/alpine-scripts.php'); ?>
    <?php if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }; ?>
</body>


</html>