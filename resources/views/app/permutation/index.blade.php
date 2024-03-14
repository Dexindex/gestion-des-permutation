<x-head-section title="Demandes Similaires" />

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        x-on:click="$store.app.toggleSidebar()"></div>
    <x-loading />
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <x-sidebar active-links="demandes-similaires" />
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
                            <span>Demandes Similaires</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">


                    </div>
                    <div class="panel mt-6">
                        <div class="grid grid-cols-2 gap-5 lg:grid-cols-3 xl:grid-cols-3 `">
                            @foreach ($data1 as $permutation)
                                <!-- card 9 -->
                                <div
                                    class=" w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                                    <div class="py-7 px-6">
                                        <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[260px] overflow-hidden">
                                            <img src="{{ asset('storage/' . $permutation->photo) }}" alt="image"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <p class="text-primary text-xs mb-1.5 font-bold">
                                            {{ \Carbon\Carbon::parse($permutation->date)->locale('fr_FR')->isoFormat('D MMMM YYYY') }}
                                        </p>
                                        <h5 class="text-[#3b3f5c] text-[15px] font-bold mb-4 dark:text-white-light">
                                            {{ $permutation->etablissement->etablissement }}</h5>
                                        <p class="text-white-dark uppercase ">

                                        <div class="text-primary flex items-center ltr:mr-1 rtl:ml-1 uppercase">
                                            <box-icon name="map" color="#506690" size="18px"></box-icon>
                                            {{ $permutation->etablissement->ville->ville . ' - ' . $permutation->etablissement->ville->region->region }}
                                        </div>

                                        </p>
                                        <div
                                            class="relative flex justify-between mt-6 pt-4 before:w-[250px] before:h-[1px] before:bg-[#e0e6ed] before:inset-x-0 before:top-0 before:absolute before:mx-auto dark:before:bg-[#1b2e4b]">
                                            <div class="flex items-center font-semibold">
                                                <div
                                                    class="w-9 h-9 rounded-full overflow-hidden inline-block ltr:mr-2 rtl:ml-2.5">
                                                    <span
                                                        class="flex w-full h-full items-center justify-center bg-[#515365] text-[#e0e6ed]">{{ $permutation->nom[0] . $permutation->prenom[0] }}</span>
                                                </div>
                                                <div class="text-[#515365] dark:text-white-dark">
                                                    {{ $permutation->nom . ' ' . $permutation->prenom }}</div>
                                            </div>
                                            <div class="flex font-semibold">
                                                <a href="{{ route('permutation.show', $permutation->id) }}"
                                                    class="btn btn-primary text-primary ">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 9 -->
                            @endforeach
                            @foreach ($data2 as $permutation2)
                                <!-- card 9 -->
                                <div
                                    class=" w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                                    <div class="py-7 px-6">
                                        <div class="-mt-7 mb-7 -mx-6 rounded-tl rounded-tr h-[260px] overflow-hidden">
                                            <img src="{{ asset('storage/' . $permutation2->photo) }}" alt="image"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <p class="text-primary text-xs mb-1.5 font-bold">
                                            {{ \Carbon\Carbon::parse($permutation2->date)->locale('fr_FR')->isoFormat('D MMMM YYYY') }}
                                        </p>
                                        <h5 class="text-[#3b3f5c] text-[15px] font-bold mb-4 dark:text-white-light">
                                            {{ $permutation2->etablissement->etablissement }}</h5>
                                        <p class="text-white-dark uppercase ">

                                        <div class="text-primary flex items-center ltr:mr-1 rtl:ml-1 uppercase">
                                            <box-icon name="map" color="#506690" size="18px"></box-icon>
                                            {{ $permutation2->etablissement->ville->ville . ' - ' . $permutation2->etablissement->ville->region->region }}
                                        </div>

                                        </p>
                                        <div
                                            class="relative flex justify-between mt-6 pt-4 before:w-[250px] before:h-[1px] before:bg-[#e0e6ed] before:inset-x-0 before:top-0 before:absolute before:mx-auto dark:before:bg-[#1b2e4b]">
                                            <div class="flex items-center font-semibold">
                                                <div
                                                    class="w-9 h-9 rounded-full overflow-hidden inline-block ltr:mr-2 rtl:ml-2.5">
                                                    <span
                                                        class="flex w-full h-full items-center justify-center bg-[#515365] text-[#e0e6ed]">{{ $permutation2->nom[0] . $permutation2->prenom[0] }}</span>
                                                </div>
                                                <div class="text-[#515365] dark:text-white-dark">
                                                    {{ $permutation2->nom . ' ' . $permutation2->prenom }}</div>
                                            </div>
                                            <div class="flex font-semibold">
                                                <a href="{{ route('permutation.show', $permutation2->id) }}"
                                                    class="btn btn-primary text-primary ">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 9 -->
                            @endforeach


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
