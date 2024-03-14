<x-head-section title="Modifier Permutation" />

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        x-on:click="$store.app.toggleSidebar()"></div>
    <x-loading />
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <x-sidebar active-links="accueil" />
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
                            <span>Modifier Permutation</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">


                    </div>
                    <div class="panel mt-6">
                        <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-1 xl:grid-cols-1">
                            <div class=" lg:col-span-2 xl:col-span-3">
                                <div class="mb-5">
                                    <h5 class="text-lg font-semibold dark:text-white-light">Modifier Permutation</h5>
                                </div>
                                <div class="mb-5">
                                    <form action="{{ route('permutation.update', $permutation->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="ctnEmailiss">Date</label>
                                            <input id="ctnEmailiss" type="date" name="date"
                                                value="{{ $permutation->date }}" placeholder="Date" class="form-input"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="ctnEmailiss">Ville</label>
                                            <select id="ctnSelect1" class="form-select text-white-dark"
                                                name="ville_id" required>
                                                @foreach ($villes as $ville)
                                                    <option @if ($permutation->ville_id == $ville->id) selected @endif
                                                        value="{{ $ville->id }}">
                                                        {{ $ville->ville }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="display: flex; justify-content: end;" class="mb-3">
                                            <a href="/"
                                                class="btn btn-danger !mt-6 w-[50%] border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                                Annuler
                                            </a>
                                            <button type="submit"
                                                class="btn btn-gradient ml-2 !mt-6 w-[50%] border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                                Modifier
                                            </button>
                                        </div>

                                    </form>
                                </div>
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
