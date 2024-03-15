<x-head-section title="Accueil" />

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
                            <a href="javascript:;" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Mes Informations</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">


                    </div>
                    <div class="panel mt-6">
                        <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
                            <div class="panel">
                                <div class="mb-5 flex items-center justify-between">
                                    <h5 class="text-lg font-semibold dark:text-white-light">Profile</h5>
                                    <a href="{{ route('formateur.edit', $user->id) }}"
                                        class="btn btn-primary rounded-full p-2 ltr:ml-auto rtl:mr-auto">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                            <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5"
                                                d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mb-5">
                                    <div class="flex flex-col items-center justify-center">
                                        <img src="./storage/{{ $user->photo }}" alt="image"
                                            class="mb-5 h-24 w-24 rounded-full object-cover">
                                        <p class="text-xl font-semibold text-primary">
                                            {{ $user->prenom . ' ' . $user->nom }}</p>
                                    </div>
                                    <ul class="mt-7 flex items-center justify-center gap-2">
                                        <li>
                                            <a class="btn btn-info flex  items-center justify-center rounded-full p-2"
                                                href="javascript:;">
                                                #{{ $user->matricule }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-danger flex items-center justify-center rounded-full p-2"
                                                href="javascript:;">
                                                {{ $user->grade }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-dark flex items-center justify-center rounded-full p-2"
                                                href="javascript:;">
                                                {{ $user->poste }}
                                            </a>
                                        </li>
                                    </ul>
                                    <ul
                                        class="m-auto mt-5 flex max-w-[180px] flex-col space-y-4 font-semibold text-white-dark">
                                        <li class="flex items-left gap-2 uppercase">
                                            <box-icon type="solid" name="school" color="#506690"
                                                size="22px"></box-icon>
                                            {{ $etablissement->etablissement . ' (' . $etablissement->ville->ville . '-' . $etablissement->ville->region->region . ')' }}

                                        </li>
                                        <li class="flex items-left gap-2">
                                            <box-icon name="envelope" color="#506690" size="22px"></box-icon>
                                            {{ $user->email }}

                                        </li>
                                        <li class="flex items-center gap-2">
                                            <box-icon name="phone" color="#506690" size="22px"></box-icon>
                                            {{ $user->tel }}

                                        </li>
                                        <li class="flex items-center gap-2">
                                            <box-icon type="solid" name="calendar" color="#506690"
                                                size="22px"></box-icon>
                                            Naissance : {{ $user->date_naissance }}

                                        </li>
                                        <li class="flex items-center gap-2">
                                            <box-icon name="calendar-week" color="#506690" size="22px"></box-icon>
                                            Recrutement : {{ $user->date_recrutement }}

                                        </li>

                                    </ul>

                                </div>
                            </div>
                            <div class="panel lg:col-span-2 xl:col-span-3">
                                <div class="mb-5" style="display: flex; justify-content: space-between">
                                    <h5 class="text-lg font-semibold dark:text-white-light">Mes Demandes</h5>
                                    <a href="{{ route('permutation.create') }}"
                                        class="btn btn-secondary rounded-full text-primary ">Nouvelle Demande</a>
                                </div>
                                <div class="mb-5">
                                    <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                                        <table class="whitespace-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Ville/Region</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="dark:text-white-dark">
                                                @foreach ($permutations as $permutation)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($permutation->date)->locale('fr_FR')->isoFormat('D MMMM YYYY') }}
                                                        </td>
                                                        <td class="text-uppercase">{{ $permutation->ville->ville }} -
                                                            ({{ $permutation->ville->region->region }})
                                                        </td>
                                                        <td>
                                                            @if ($permutation->valide == 0)
                                                                <div
                                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                                                    <div class="w-[15%] rounded-full bg-danger"></div>
                                                                </div>
                                                            @elseif ($permutation->valide == 1)
                                                                <div
                                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40">
                                                                    <div class="w-full rounded-full bg-success"></div>
                                                                </div>
                                                            @endif

                                                        </td>
                                                        <td class="text-danger" style="display: flex;">
                                                            @if ($permutation->valide == 0)
                                                                <form
                                                                    action="{{ route('permutation.destroy', $permutation->id) }}"
                                                                    method="post" id="deleteForm">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-sm btn-danger rounded-full"
                                                                        type="button"
                                                                        onclick="showDeleteConfirmation(event)">
                                                                        <box-icon color="#fafafa"
                                                                            name="trash"></box-icon>
                                                                    </button>
                                                                </form>
                                                                <a href="{{ route('permutation.edit', $permutation->id) }}"
                                                                    class="btn btn-sm btn-secondary rounded-full ml-2"
                                                                    type="button">
                                                                    <box-icon color="#fafafa"
                                                                        name="edit"></box-icon>
                                                                </a>

                                                                <form
                                                                    action="{{ route('permutation.valider', $permutation->id) }}"
                                                                    method="post" id="validerForm">
                                                                    @method('put')
                                                                    @csrf
                                                                    <button
                                                                        class="btn btn-sm btn-success rounded-full ml-2"
                                                                        type="button"
                                                                        onclick="showActionConfirmation(event)">
                                                                        <box-icon color="#fafafa"
                                                                            name="check"></box-icon>
                                                                    </button>
                                                                </form>
                                                            @else
                                                            <div class="btn btn-success">Aucune Action (Valider)</div>
                                                            @endif



                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./assets/vendor/dataTables.min.js"></script>
    <script defer src="assets/js/apexcharts.js"></script>
    <x-scripts />


    @if (session('error'))
        <x-alert type="error" msg="{{ session('error') }}" />
    @endif


    @if (session('success'))
        <x-alert type="success" msg="{{ session('success') }}" />
    @endif
</body>


</html>
