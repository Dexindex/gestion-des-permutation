@props(['activeLinks'])



<!-- start sidebar section -->
<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
        <div class="h-full bg-white dark:bg-[#0e1726]">
            <div class="flex items-center justify-between px-4 py-3">
                <a href="/" class="main-logo flex shrink-0 items-center">
                    <img width="180" class="ml-[5px]  flex-none" src="{{ asset('images/logo.png') }}" alt="image" />
                </a>
                <a href="javascript:;"
                    class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                    x-on:click="$store.app.toggleSidebar()">
                    <box-icon class="m-auto h-5 w-5" color="#506690" width="20" height="20"
                        name="menu"></box-icon>
                </a>
            </div>
            <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                x-data="{ activeDropdown: 'dashboard' }">

                <li class="nav-item my-2">
                    <ul>
                        <li class="nav-item ">
                            <a href="{{ route('admin.index') }}"
                                class="group {{ $activeLinks === 'accueil' ? 'active' : '' }}">
                                <div class="flex items-center">

                                    <box-icon color="#506690" width="20" height="20" name="home"></box-icon>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Accueil
                                        - Dashboard</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <ul>
                        <li class="nav-item ">
                            <a href="{{ route('admin.metier') }}"
                                class="group {{ $activeLinks === 'metiers' ? 'active' : '' }}">
                                <div class="flex items-center">

                                    <box-icon color="#506690" width="20" height="20" name="briefcase"></box-icon>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Metiers</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <ul>
                        <li class="nav-item ">
                            <a href="{{ route('admin.etablissement') }}"
                                class="group {{ $activeLinks === 'etablissements' ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <box-icon color="#506690" width="20" height="20" name="building"></box-icon>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Etablissements</span>
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
