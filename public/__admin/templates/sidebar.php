<?php
function sidebar($activeLinks)
{

?>

    <!-- start sidebar section -->
    <div :class="{'dark text-white-dark' : $store.app.semidark}">
        <nav x-data="sidebar" class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
            <div class="h-full bg-white dark:bg-[#0e1726]">
                <div class="flex items-center justify-between px-4 py-3">
                    <a href="./" class="main-logo flex shrink-0 items-center">
                        <img width="140" class="ml-[5px]  flex-none" src="./../assets/images/logo/logo.png" alt="image" />
                    </a>
                    <a href="javascript:;" class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10" @click="$store.app.toggleSidebar()">

                        <box-icon class="m-auto h-5 w-5" color="#506690" width="20" height="20" name="menu"></box-icon>

                    </a>
                </div>
                <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold" x-data="{ activeDropdown: 'dashboard' }">

                    <li class="nav-item my-5">
                        <ul>
                            <li class="nav-item ">
                                <a href="./" class="group <?= $activeLinks === 'accueil' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" name="home"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Accueil - Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Store Configuration</span>
                    </h2>

                    <li class="nav-item">
                        <ul>
                            <li class="nav-item ">
                                <a href="./marques" class="group <?= $activeLinks === 'marques' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" name="barcode-reader"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Gestion Des Marques</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul>
                            <li class="nav-item">
                                <a href="./series" class="group <?= $activeLinks === 'series' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" name="package"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Gestion Des Series</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul>
                            <li class="nav-item">
                                <a href="./modeles" class="group <?= $activeLinks === 'modeles' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" type="logo" name="creative-commons"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Gestion Des Modeles</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul>
                            <li class="nav-item">
                                <a href="./imprimantes" class="group <?= $activeLinks === 'imprimantes' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" name="printer"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Les Imprimantes</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08] ">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Store Produits</span>
                    </h2>

                    <li class="nav-item">
                        <ul>
                            <li class="nav-item ">
                                <a href="./toners" class="group <?= $activeLinks === 'toners' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" name="test-tube"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Toners Et Cartouches</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul>
                            <li class="nav-item">
                                <a href="./imprimantes-articles" class="group <?= $activeLinks === 'imprimantes-articles' ? 'active' : '' ?>">
                                    <div class="flex items-center">
                                        <box-icon color="#506690" width="20" height="20" name="printer"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Imprimantes D'Occasion</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08] ">
                        <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Suivi Des Commandes</span>
                    </h2>

                    <li class="nav-item">
                        <ul>
                            <li class="nav-item ">
                                <a href="./commandes-en-cours" class="group <?= $activeLinks === 'commandes-en-cours' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20" type="solid" name="truck"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Commandes En Cours</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <ul>
                            <li class="nav-item ">
                                <a href="./commandes-cloturer" class="group <?= $activeLinks === 'commandes-cloturer' ? 'active' : '' ?>">
                                    <div class="flex items-center">

                                        <box-icon color="#506690" width="20" height="20"  name="check-circle"></box-icon>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Commandes Clôturer</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                   






                </ul>
            </div>
        </nav>
    </div>
    <!-- end sidebar section -->

<?php } ?>