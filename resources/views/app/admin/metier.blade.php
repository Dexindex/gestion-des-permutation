

<x-head-section title="Administration - Metiers" />

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        x-on:click="$store.app.toggleSidebar()"></div>
    <x-loading />
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <x-sidebar-admin active-links="metiers" />
        <div class="main-content flex min-h-screen flex-col">
            <x-header :siteinfo="$admin" />
            <div class="animate__animated p-6" style="z-index: 2;" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="javascript:;" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Metiers</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">
                        <div x-data="modal">
                            <li>
                                <button type="button" class="btn btn-primary mr-2" @click="toggle">
                                    Ajouter <box-icon class="ml-2" color="white" type='solid'
                                        name='folder-plus'></box-icon>
                                </button>
                                <!-- button -->
                                <!-- modal -->
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                    :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4"
                                        @click.self="open = false">
                                        <div style="margin-top: 80px!important;" x-show="open" x-transition
                                            x-transition.duration.300
                                            class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                            <div
                                                class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">
                                                Ajouter Une Metier
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">
                                                    X
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form method="post" action="{{ route('admin.metier.add') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="relative mb-4">
                                                        <span
                                                            class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                            <box-icon name='briefcase'></box-icon>
                                                        </span>
                                                        <input type="text" name="metier" placeholder="Metier"
                                                            class="form-input ltr:pl-10 rtl:pr-10" />

                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <button type="button" @click="toggle"
                                                            class="btn btn-danger w-full">Annuler</button>
                                                        <button type="submit"
                                                            class="btn btn-secondary w-full">Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>

                    </div>
                    <div class="panel mt-6">
                        <div x-data>


                            <table id="example"
                                class=" table border table-bordered table-hover table-striped table-responsive"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Metier</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metiers as $metier)
                                        <tr>
                                            <td>#{{ $metier->id }}</td>
                                            <td>{{ $metier->metier }}</td>
                                            <td>
                                                <div style="display: flex;justify-content: start;">
                                                    <div class="" x-data="modal">
                                                        <button type="button"
                                                            class="btn btn-success w-10 h-10 p-0 rounded-full mr-3"
                                                            @click="toggle">
                                                            <box-icon name='edit' type='solid'
                                                                color="white"></box-icon>
                                                        </button>
                                                        <!-- button -->
                                                        <!-- modal -->
                                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                                                            :class="open && '!block'">
                                                            <div class="flex items-start justify-center min-h-screen px-4"
                                                                @click.self="open = false">
                                                                <div style="margin-top: 80px!important;" x-show="open"
                                                                    x-transition x-transition.duration.300
                                                                    class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                                                    <div
                                                                        class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">
                                                                        Modifier {{ $metier->metier }}
                                                                        <button type="button" @click="toggle"
                                                                            class="text-white-dark hover:text-dark">
                                                                            X
                                                                        </button>
                                                                    </div>
                                                                    <div class="p-5">
                                                                        <form method="post"
                                                                            action="{{ route('admin.metier.update', $metier->id) }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="relative mb-4">
                                                                                <span
                                                                                    class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                                                    <box-icon
                                                                                        name='briefcase'></box-icon>
                                                                                </span>
                                                                                <input type="text" name="metier"
                                                                                    value="{{ $metier->metier }}"
                                                                                    placeholder="Metier"
                                                                                    class="form-input ltr:pl-10 rtl:pr-10" />

                                                                            </div>
                                                                            <div class="grid grid-cols-2 gap-4">
                                                                                <button type="button" @click="toggle"
                                                                                    class="btn btn-danger w-full">Annuler</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-secondary w-full">Modifier</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <form action="{{ route('admin.metier.delete', $metier->id) }}"
                                                        method="post" id="deleteForm">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger rounded-full"
                                                            type="button" onclick="showDeleteConfirmation(event)">
                                                            <box-icon color="#fafafa" name="trash"></box-icon>
                                                        </button>
                                                    </form>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
