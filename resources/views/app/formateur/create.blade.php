<!DOCTYPE html>
<html lang="fr" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gestion Des Permutation | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="./images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- screen loader -->
    <x-loading />




    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <div x-data="auth">
            <div class="absolute inset-0">
                <img src="assets/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover" />
            </div>

            <div
                class="relative flex min-h-screen items-center justify-center  bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
                <img src="assets/images/auth/coming-soon-object1.png" alt="image"
                    class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" />
                <div
                    class="relative  max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                    <div
                        class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6  py-20">

                        <div class="mx-auto w-full max-w-[870px]" style="padding-left: 3rem;padding-right: 3rem">
                            <div class="mb-10">
                                <h1
                                    class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl text-center">
                                    Nouveau formateur </h1>
                                @if ($errors->any())


                                    <div
                                        class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
                                            x
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <form class="space-y-5 dark:text-white" action="{{ route('register.store') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <!-- form controls -->
                                    <div class="mb-3">
                                        <label for="ctnEmail">Prenom</label>
                                        <input id="ctnEmail" type="text" name="prenom" placeholder="Prenom"
                                            value="{{ old('prenom') }}" class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmaili">Nom</label>
                                        <input id="ctnEmaili" type="text" name="nom" placeholder="Nom"
                                            value="{{ old('nom') }}" class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailis">Matricule</label>
                                        <input id="ctnEmailis" type="text" name="matricule" placeholder="Matricule"
                                            value="{{ old('matricule') }}" class="form-input" required />
                                    </div>
                                    <div>
                                        <label for="ctnFile">Profile Image</label>
                                        <input id="ctnFile" type="file" accept="image/*" name="photo"
                                            class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"
                                            required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailis">Grade</label>
                                        <input id="ctnEmailis" type="text" name="grade" placeholder="Grade"
                                            value="{{ old('grade') }}" class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailiss">Date de naissance</label>
                                        <input id="ctnEmailiss" type="date" name="date_naissance"
                                            value="{{ old('date_naissance') }}" placeholder="Date de naissance"
                                            class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailisss">Date de recrutement</label>
                                        <input id="ctnEmailisss" type="date" name="date_recrutement"
                                            value="{{ old('date_recrutement') }}" placeholder="Date de recrutement"
                                            class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailiswew">Poste</label>
                                        <input id="ctnEmailiswew" type="text" name="poste" placeholder="Poste"
                                            value="{{ old('poste') }}" class="form-input" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnEmailiswew">Telephone</label>
                                        <fieldset>
                                            <input id="phoneMask" type="tel" placeholder="(+212) 612-345-678"
                                                value="{{ old('tel') }}" name="tel" class="form-input" />
                                        </fieldset>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnSelect1">Etablissement</label>
                                        <select id="ctnSelect1" class="form-select text-white-dark"
                                            name="etablissement_id" required>
                                            @foreach ($etablissments as $etablissment)
                                                <option @if (old('etablissement_id') == $etablissment->id) selected @endif
                                                    value="{{ $etablissment->id }}">
                                                    {{ $etablissment->etablissement }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ctnSelect1h">Metier</label>
                                        <select id="ctnSelect1h" class="form-select text-white-dark" name="metier_id"
                                            required>
                                            @foreach ($metiers as $metier)
                                                <option @if (old('metier_id') == $metier->id) selected @endif
                                                    value="{{ $metier->id }}">{{ $metier->metier }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ctnEmailiswew">Email</label>
                                        <input id="ctnEmailiswew" type="email" name="email" placeholder="Email"
                                            value="{{ old('email') }}" class="form-input" required />
                                    </div>


                                    <div class="mb-3">
                                        <label for="ctnEmailiswew">Mot De Passe</label>
                                        <input id="ctnEmailiswew" type="password" name="password"
                                            value="{{ old('password') }}" placeholder="Mot De Passe"
                                            class="form-input mb-2" required />
                                        <input id="ctnEmailiswew" type="password" name="password_confirmation"
                                            placeholder="Mot De Passe Confirmation" class="form-input" required />
                                    </div>




                                </div>


                                <button type="submit" name="submit"
                                    class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                    Creer mon compte
                                </button>
                                <hr>
                                <a href="{{ route('login.show') }}"
                                    class="btn btn-secondary !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                    J'ai déja un compte
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>

    <script src="assets/js/custom.js"></script>


    @if (session('error'))
        <x-alert type="error" msg="{{ session('error') }}" />
    @endif


    @if (session('success'))
        <x-alert type="success" msg="{{ session('error') }}" />
    @endif




</body>

</html>
