<?php require('./templates/head-section.php');
headSection("Produits | Toners");







//!imprimante Liste
$sqlToners = 'SELECT * FROM cartouches_toners';
$statement = $con->prepare($sqlToners);
$statement->execute();
$Toners = $statement->fetchAll(PDO::FETCH_OBJ);

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
                            <a href="javascript:;" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Produits | Toners</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">
                        <a href="./ajouter-toner" class="btn btn-primary mr-2" @click="toggle">
                            Ajouter <box-icon class="ml-2" color="white" type='solid' name='folder-plus'></box-icon>
                        </a>

                    </div>
                    <div class="panel mt-6">
                        <div x-data>

                            <table id="example" class=" table border table-bordered table-hover table-striped table-responsive" style="width:100%!important;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Prix TTC</th>
                                        <th>Qte</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Toners as $toner) { ?>
                                        <tr>
                                            <td><?= $toner->id; ?></td>
                                            <td><?= $toner->titre; ?></td>
                                            <?php if ($toner->prix_remise != NULL) { ?>
                                                <td><?= $toner->prix_remise + ($toner->prix_remise * $toner->tax / 100); ?> Dhs</td>
                                            <?php } else { ?>
                                                <td><?= $toner->prix_ht + ($toner->prix_ht * $toner->tax / 100); ?> Dhs</td>
                                            <?php } ?>
                                            <td><?= $toner->qte; ?></td>
                                            <td>
                                                <img src="../_umedia/<?= $toner->image; ?>" class="h-10 w-10 rounded" alt="image" srcset="../_umedia/<?= $toner->image; ?>">
                                            </td>





                                            <td>
                                                <div style="display: flex;justify-content: start;">
                                                    <a href="./modifier-toner?id=<?= $toner->id; ?>" class="btn btn-success w-10 h-10 p-0 rounded-full mr-3">
                                                        <box-icon name='edit' type='solid' color="white"></box-icon>
                                                    </a>
                                                    <a target="_blank" href="../produit-toner?id=<?= $toner->id; ?>" class="btn btn-secondary w-10 h-10 p-0 rounded-full mr-3">
                                                        <box-icon name='show' type='solid' color="white"></box-icon>
                                                    </a>


                                                    <button type="button" onclick="showDeleteConfirmation(event, './__sp/toners?id=<?= $toner->id; ?>')" class="btn btn-danger w-10 h-10 p-0 rounded-full">
                                                        <box-icon name='trash' type='solid' color="white"></box-icon>
                                                    </button>
                                                </div>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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