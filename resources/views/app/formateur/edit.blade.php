<x-head-section title="Modifier Mes Informations" />

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        x-on:click="$store.app.toggleSidebar()"></div>
    <x-loading />
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <x-sidebar active-links="mes-informations" />
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
                            <span>Modifier Mes Informations</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">


                    </div>
                    <div class="panel mt-6">
                        <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-1 xl:grid-cols-1">
                            <div class=" lg:col-span-2 xl:col-span-3">
                                <div class="mb-5">
                                    <h5 class="text-lg font-semibold dark:text-white-light">Modifier Mes Informations
                                    </h5>
                                </div>
                                <div class="mb-5">
                                    <form action="{{ route('formateur.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div>
                                            <!-- form controls -->
                                            <div class="grid grid-cols-3 gap-5 lg:grid-cols-3 xl:grid-cols-3">
                                                <div class="mb-3">
                                                    <label for="ctnEmail">Prenom</label>
                                                    <input id="ctnEmail" type="text" name="prenom"
                                                        placeholder="Prenom" value="{{ $user->prenom }}"
                                                        class="form-input" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnEmaili">Nom</label>
                                                    <input id="ctnEmaili" type="text" name="nom"
                                                        placeholder="Nom" value="{{ $user->nom }}" class="form-input"
                                                        required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnEmailis">Matricule</label>
                                                    <input id="ctnEmailis" type="text" name="matricule"
                                                        placeholder="Matricule" value="{{ $user->matricule }}"
                                                        class="form-input" required />
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-5 lg:grid-cols-3 xl:grid-cols-3">
                                                <div>
                                                    <label for="ctnFile">Profile Image</label>
                                                    <input id="ctnFile" type="file" accept="image/*" name="photo"
                                                        class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnEmailis">Grade</label>
                                                    <input id="ctnEmailis" type="text" name="grade"
                                                        placeholder="Grade" value="{{ $user->grade }}"
                                                        class="form-input" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnEmailiswew">Poste</label>
                                                    <input id="ctnEmailiswew" type="text" name="poste"
                                                        placeholder="Poste" value="{{ $user->poste }}"
                                                        class="form-input" required />
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-2 gap-5 lg:grid-cols-2 xl:grid-cols-2">
                                                <div class="mb-3">
                                                    <label for="ctnSelect1">Etablissement</label>
                                                    <select id="ctnSelect1" class="form-select text-white-dark"
                                                        name="etablissement_id" required>
                                                        @foreach ($etablissments as $etablissment)
                                                            <option @if ($user->etablissement_id == $etablissment->id) selected @endif
                                                                value="{{ $etablissment->id }}">
                                                                {{ $etablissment->etablissement }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnSelect1h">Metier</label>
                                                    <select id="ctnSelect1h" class="form-select text-white-dark"
                                                        name="metier_id" required>
                                                        @foreach ($metiers as $metier)
                                                            <option @if ($user->metier_id == $metier->id) selected @endif
                                                                value="{{ $metier->id }}">{{ $metier->metier }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="grid grid-cols-2 gap-5 lg:grid-cols-2 xl:grid-cols-2">
                                                <div class="mb-3">
                                                    <label for="ctnEmailiss">Date de naissance</label>
                                                    <input id="ctnEmailiss" type="date" name="date_naissance"
                                                        value="{{ $user->date_naissance }}"
                                                        placeholder="Date de naissance" class="form-input" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ctnEmailisss">Date de recrutement</label>
                                                    <input id="ctnEmailisss" type="date" name="date_recrutement"
                                                        value="{{ $user->date_recrutement }}"
                                                        placeholder="Date de recrutement" class="form-input"
                                                        required />
                                                </div>
                                            </div>



                                            <div class="grid grid-cols-2 gap-5 lg:grid-cols-2 xl:grid-cols-2">
                                                <div class="mb-3">
                                                    <label for="ctnEmailiswew">Telephone</label>
                                                    <fieldset>
                                                        <input id="phoneMask" type="tel"
                                                            placeholder="(+212) 612-345-678"
                                                            value="{{ $user->tel }}" name="tel"
                                                            class="form-input" />
                                                    </fieldset>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="ctnEmailiswew">Email</label>
                                                    <input id="ctnEmailiswew" type="email" disabled
                                                        placeholder="Email" value="{{ $user->email }}"
                                                        class="form-input" />
                                                </div>
                                            </div>




                                            <div class="mb-3 ">
                                                <label for="ctnEmailiswew">Mot De Passe</label>
                                                <div class="grid grid-cols-2 gap-5 lg:grid-cols-2 xl:grid-cols-2">
                                                    <input id="ctnEmailiswew" type="password" name="password"
                                                        value="{{ old('password') }}" placeholder="Mot De Passe"
                                                        class="form-input" />
                                                    <input id="ctnEmailiswew" type="password"
                                                        name="password_confirmation"
                                                        placeholder="Mot De Passe Confirmation" class="form-input" />

                                                </div>
                                            </div>




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
