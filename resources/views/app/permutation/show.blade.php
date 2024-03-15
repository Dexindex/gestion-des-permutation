<x-head-section title="Valider Demande" />

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        x-on:click="$store.app.toggleSidebar()"></div>
    <x-loading />
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <x-sidebar active-links="valider-demande" />
        <div class="main-content flex min-h-screen flex-col">
            <x-header :siteinfo="$user" />
            <div class="animate__animated p-6" style="z-index: 2;" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="/" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Valider Demande</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">


                    </div>
                    <div class="panel mt-6">
                        <!-- animated -->
                        <div class=" mx-auto mt-20 dark:text-white-dark">
                            <!-- freelancer -->
                            <div
                                class="md:flex  justify-between space-y-14 md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                                <div
                                    class="border border-[#e0e6ed] dark:border-[#1b2e4b] rounded transition-all duration-300 group w-full">
                                    <div class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] p-5 pt-0">
                                        <span
                                            class="bg-white dark:bg-[#0e1726] text-[#3b3f5c] dark:text-white-light border-2 border-primary w-[70px] h-[70px] lg:w-[100px] lg:h-[100px] rounded flex justify-center items-center text-xl lg:text-3xl font-bold -mt-[30px] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px]">
                                            <img class="w-full h-full" src="{{ asset('storage/' . $formateur->photo) }}"
                                                alt="img" srcset="{{ asset('storage/' . $formateur->photo) }}">
                                        </span>
                                        <h3 class="text-xl lg:text-2xl mt-4 mb-2.5">
                                            {{ $formateur->nom . ' ' . $formateur->prenom }}
                                            (#{{ $formateur->matricule }})</h3>
                                        <p class="text-[15px] uppercase">
                                            {{ $formateur->etablissement->ville->ville . ' - ' . $formateur->etablissement->ville->region->region }}
                                        </p>
                                    </div>
                                    <div class="p-5">
                                        <ul class="space-y-2.5 mb-5 font-semibold">
                                            <li>Poste : {{ $formateur->poste }}</li>
                                            <li>Metier : {{ $formateur->metier->metier }}</li>
                                            <li>Grade : {{ $formateur->grade }}</li>
                                            <li>Date de naissance :
                                                {{ \Carbon\Carbon::parse($formateur->date_naissance)->locale('fr_FR')->isoFormat('D MMMM YYYY') }}
                                            </li>
                                            <li>Date de recrutement :
                                                {{ \Carbon\Carbon::parse($formateur->date_recrutement)->locale('fr_FR')->isoFormat('D MMMM YYYY') }}
                                            </li>
                                        </ul>
                                        <div style="display: flex; justify-content: space-between;" class="gap-2">
                                            <a href="tel:{{ $formateur->tel }}" target="_blank"
                                                class="btn btn-primary block w-full"><box-icon name="phone"
                                                    color="#fff" size="18px"></box-icon> Appeler</a>
                                            <a href="mailto:{{ $formateur->email }}" target="_blank"
                                                class="btn btn-secondary block w-full"><box-icon name="mail-send"
                                                    color="#fff" size="18px"></box-icon> Envoyer un email</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- small business -->
                                <div
                                    class="border border-[#e0e6ed] dark:border-[#1b2e4b] rounded transition-all duration-300 group w-full">
                                    <div class="border-b border-[#e0e6ed] dark:border-[#1b2e4b] p-5 pt-0">
                                        <span
                                            class="bg-white dark:bg-[#0e1726] text-[#3b3f5c] dark:text-white-light border-2 border-primary w-[70px] h-[70px] lg:w-[100px] lg:h-[100px] rounded flex justify-center items-center text-xl lg:text-3xl font-bold -mt-[30px] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px]">
                                            {{ $formateur->etablissement->etablissement[0] }}

                                        </span>
                                        <h3 class="text-xl lg:text-2xl mt-4 mb-2.5">
                                            {{ $formateur->etablissement->etablissement }}
                                            (#{{ $formateur->etablissement->code }})</h3>
                                        <p class="text-[15px] uppercase"> {{ $formateur->etablissement->adresse }}</p>
                                    </div>
                                    <div class="p-5">
                                        <ul class="space-y-2.5 mb-5 font-semibold">
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>

                                        </ul>
                                        {{-- <a href="mailto:{{ $formateur->etablissement->email }}" target="_blank"
                                            class="btn btn-secondary block w-full mb-3"><box-icon name="mail-send"
                                                color="#fff" size="18px"></box-icon> Envoyer un email</a> --}}
                                        <div style="display: flex; justify-content: space-between;" class="gap-2">
                                            <a href="tel:{{ $formateur->etablissement->tel }}" target="_blank"
                                                class="btn btn-primary block w-full"><box-icon name="phone"
                                                    color="#fff" size="18px"></box-icon> Appeler(Mobile)</a>
                                            <a href="tel:{{ $formateur->etablissement->fax }}" target="_blank"
                                                class="btn btn-success block w-full"><box-icon name="phone"
                                                    color="#fff" size="18px"></box-icon> Appeler(Fax)</a>

                                        </div>
                                    </div>
                                </div>

                                <!-- enterprise -->
                            </div>
                        </div>


                    </div>
                </div>
                <!-- end main content section -->
            </div>

            <x-footer />
        </div>
    </div>
    <script src="{{ asset('assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('assets/js/alpine-persist.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine-ui.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine-focus.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/alpine.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('./assets/vendor/dataTables.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <x-scripts />


    @if (session('error'))
        <x-alert type="error" msg="{{ session('error') }}" />
    @endif


    @if (session('success'))
        <x-alert type="success" msg="{{ session('success') }}" />
    @endif
</body>


</html>
