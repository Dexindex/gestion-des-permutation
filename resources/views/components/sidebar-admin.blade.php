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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passcode = prompt("Veuillez entrer le code:");
        if (passcode !== null) {
            // Hash the passcode using SHA-256
            var hashedPasscode = sha256(passcode);
            if (hashedPasscode === 'f9310e87c56ec02807ba8f7412822a3a880ee627e49f1b4cc5520e36a5851911') {
                document.body.style.overflow = 'auto';
            } else {
                window.location.href = "/";
            }
        } else {
            window.location.href = "/";
        }
    });

    // SHA-256 hashing function (source: https://geraintluff.github.io/sha256/)
    function sha256(ascii) {
        function rightRotate(value, amount) {
            return (value >>> amount) | (value << (32 - amount));
        }

        var mathPow = Math.pow;
        var maxWord = mathPow(2, 32);
        var lengthProperty = 'length';
        var i, j;
        var result = '';

        var words = [];
        var asciiBitLength = ascii[lengthProperty] * 8;

        // Append padding
        words[(((asciiBitLength + 64) >>> 9) << 4) + 15] = asciiBitLength;
        for (j = 0; j < words[lengthProperty]; j += 16) {
            var H0 = 0x6a09e667;
            var H1 = 0xbb67ae85;
            var H2 = 0x3c6ef372;
            var H3 = 0xa54ff53a;
            var H4 = 0x510e527f;
            var H5 = 0x9b05688c;
            var H6 = 0x1f83d9ab;
            var H7 = 0x5be0cd19;

            var currentBlock = words.slice(j, j + 16);

            var w = [];
            for (i = 0; i < 64; i++) {
                if (i < 16) w[i] = currentBlock[i];
                else {
                    var a = w[i - 15];
                    var b = w[i - 2];
                    w[i] = ((rightRotate(a, 7) ^ rightRotate(a, 18) ^ (a >>> 3)) +
                        (rightRotate(b, 17) ^ rightRotate(b, 19) ^ (b >>> 10)) +
                        w[i - 16] + w[i - 7]) | 0;
                }

                var T1 = (H7 + (rightRotate(H4, 6) ^ rightRotate(H4, 11) ^ rightRotate(H4, 25))) +
                    ((H4 & H5) ^ (~H4 & H6)) + H3 + w[i];
                var T2 = (rightRotate(H0, 2) ^ rightRotate(H0, 13) ^ rightRotate(H0, 22)) +
                    ((H0 & H1) ^ (H0 & H2) ^ (H1 & H2));

                H7 = H6;
                H6 = H5;
                H5 = H4;
                H4 = (H3 + T1) | 0;
                H3 = H2;
                H2 = H1;
                H1 = H0;
                H0 = (T1 + T2) | 0;
            }

            H0 = (H0 + 0x6a09e667) | 0;
            H1 = (H1 + 0xbb67ae85) | 0;
            H2 = (H2 + 0x3c6ef372) | 0;
            H3 = (H3 + 0xa54ff53a) | 0;
            H4 = (H4 + 0x510e527f) | 0;
            H5 = (H5 + 0x9b05688c) | 0;
            H6 = (H6 + 0x1f83d9ab) | 0;
            H7 = (H7 + 0x5be0cd19) | 0;
        }

        var hex = '';
        var i = 0;
        var j = 0;
        for (i = 0; i < 8; i++) {
            hex += ((H0 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H1 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H2 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H3 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H4 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H5 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H6 >> (24 - (i * 4))) & 0xff).toString(16);
            hex += ((H7 >> (24 - (i * 4))) & 0xff).toString(16);
        }

        return hex;
    }
</script>

<!-- end sidebar section -->
