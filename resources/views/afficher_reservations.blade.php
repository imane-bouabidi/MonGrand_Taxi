<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }

    .sidebar:hover {
        width: 16rem;
    }

    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }

    .rating-wrapper {
        align-self: center;
        box-shadow: 7px 7px 25px rgba(198, 206, 237, .7),
            -7px -7px 35px rgba(255, 255, 255, .7),
            inset 0px 0px 4px rgba(255, 255, 255, .9),
            inset 7px 7px 15px rgba(198, 206, 237, .8);
        border-radius: 5rem;
        display: inline-flex;
        direction: rtl !important;
        padding: .6rem 2.5rem;
        margin-left: auto;


        label {
            color: #E1E6F6;
            cursor: pointer;
            display: inline-flex;
            font-size: 3rem;
            padding: 1rem .6rem;
            transition: color 0.5s;
        }

        svg {
            -webkit-text-fill-color: transparent;
            -webkit-filter: drop-shadow (4px 1px 6px rgba(198, 206, 237, 1));
            filter: drop-shadow(5px 1px 3px rgba(198, 206, 237, 1));
        }

        input {
            height: 100%;
            width: 100%;
        }

        input {
            display: none;
        }

        label:hover,
        label:hover~label,
        input:checked~label {
            color: #34AC9E;
        }

        label:hover,
        label:hover~label,
        input:checked~label {
            color: #34AC9E;
        }
    }
</style>

<body>
    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div
            class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

            <!-- Header -->
            <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                <div
                    class="flex items-center justify-end md:justify-center pl-3 w-14 md:w-64 h-14 bg-black dark:bg-gray-800 border-none">
                    <img class="w-5 h-5 md:w-10 md:h-10 mr-2 rounded-full overflow-hidden"
                        src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                    <span class="hidden md:block">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex justify-end items-center h-14 bg-black dark:bg-gray-800 header-right">
                    <ul class="flex items-center">

                        <li>
                            <a href="{{ route('home') }}" class="flex items-end justify-end mr-4 hover:text-blue-100">
                                <span class="inline-flex mr-1">
                                </span>
                                Home
                            </a>
                        </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="index.php?action=logOut"
                                    class="flex items-end justify-end mr-4 hover:text-blue-100">
                                    <span class="inline-flex mr-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                    </span>
                                    <button type="submit">Logout</button>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./Header -->

            <!-- Sidebar -->
            <div
                class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-gray-500 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('chauffeurDashboard') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                        viewBox="0 0 24 24" fill="none">
                                        <path clip-rule="evenodd"
                                            d="m12 3.75c-4.55635 0-8.25 3.69365-8.25 8.25 0 4.5563 3.69365 8.25 8.25 8.25 4.5563 0 8.25-3.6937 8.25-8.25 0-4.55635-3.6937-8.25-8.25-8.25zm-9.75 8.25c0-5.38478 4.36522-9.75 9.75-9.75 5.3848 0 9.75 4.36522 9.75 9.75 0 5.3848-4.3652 9.75-9.75 9.75-5.38478 0-9.75-4.3652-9.75-9.75zm9.75-.75c.4142 0 .75.3358.75.75v3.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75v-3.5c0-.4142.3358-.75.75-.75zm0-3.25c-.5523 0-1 .44772-1 1s.4477 1 1 1h.01c.5523 0 1-.44772 1-1s-.4477-1-1-1z"
                                            fill="white" fill-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Gestion des horaires</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('afficher_reservations') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                        viewBox="0 0 24 24" fill="none">
                                        <path clip-rule="evenodd"
                                            d="m12 3.75c-4.55635 0-8.25 3.69365-8.25 8.25 0 4.5563 3.69365 8.25 8.25 8.25 4.5563 0 8.25-3.6937 8.25-8.25 0-4.55635-3.6937-8.25-8.25-8.25zm-9.75 8.25c0-5.38478 4.36522-9.75 9.75-9.75 5.3848 0 9.75 4.36522 9.75 9.75 0 5.3848-4.3652 9.75-9.75 9.75-5.38478 0-9.75-4.3652-9.75-9.75zm9.75-.75c.4142 0 .75.3358.75.75v3.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75v-3.5c0-.4142.3358-.75.75-.75zm0-3.25c-.5523 0-1 .44772-1 1s.4477 1 1 1h.01c.5523 0 1-.44772 1-1s-.4477-1-1-1z"
                                            fill="white" fill-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Listes des reservations</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('historique_driver')}}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-black dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-white dark:hover:border-gray-800 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                        viewBox="0 0 24 24" fill="none">
                                        <path clip-rule="evenodd"
                                            d="m12 3.75c-4.55635 0-8.25 3.69365-8.25 8.25 0 4.5563 3.69365 8.25 8.25 8.25 4.5563 0 8.25-3.6937 8.25-8.25 0-4.55635-3.6937-8.25-8.25-8.25zm-9.75 8.25c0-5.38478 4.36522-9.75 9.75-9.75 5.3848 0 9.75 4.36522 9.75 9.75 0 5.3848-4.3652 9.75-9.75 9.75-5.38478 0-9.75-4.3652-9.75-9.75zm9.75-.75c.4142 0 .75.3358.75.75v3.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75v-3.5c0-.4142.3358-.75.75-.75zm0-3.25c-.5523 0-1 .44772-1 1s.4477 1 1 1h.01c.5523 0 1-.44772 1-1s-.4477-1-1-1z"
                                            fill="white" fill-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Historique</span>
                            </a>
                        </li>
                    </ul>
                    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2024</p>
                </div>
            </div>
            <!-- ./Sidebar -->

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

                <div class="mt-4 mx-4 ">

                    <h1 class="text-center  m-10">Gestion Des horaires</h1>
                    <!-- Client Table -->
                    <div class="mt-4 mx-4">
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Nom client</th>
                                            <th class="px-4 py-3">Date</th>
                                            <th class="px-4 py-3">ville depart</th>
                                            <th class="px-4 py-3">ville arrivee</th>
                                            <th class="px-4 py-3">Statut</th>
                                            <th class="px-4 py-3">Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @foreach ($reservations as $reservation)
                                            <tr
                                                class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            {{ $reservation->passager->user->name }}

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            {{ $reservation->horaire_driver->horaire->date }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $reservation->horaire_driver->driver->trajet->depart->ville_name }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        {{ $reservation->horaire_driver->driver->trajet->arrivee->ville_name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    <div class="flex items-center text-sm">
                                                        {{ $reservation->horaire_driver->statut }}
                                                    </div>
                                                </td>
                                                {{-- @if (in_array($reservation->horaire_driver->statut, ['done', 'annulee'])) --}}
                                                <td class="px- py-3 text-sm">
                                                    <form action="" method="GET">
                                                        <div class="container-wrapper">
                                                            <div
                                                                class="container d-flex align-items-center justify-content-center">
                                                                <div class="row justify-content-center">

                                                                    <!-- star rating -->
                                                                    <div class="rating-wrapper">

                                                                        <!-- star 5 -->
                                                                        <input type="radio" id="5-star-rating"
                                                                            name="star-rating" value="5">
                                                                        <label for="5-star-rating"
                                                                            class="star-rating">
                                                                            <i class="fas fa-star d-inline-block"></i>
                                                                        </label>

                                                                        <!-- star 4 -->
                                                                        <input type="radio" id="4-star-rating"
                                                                            name="star-rating" value="4">
                                                                        <label for="4-star-rating"
                                                                            class="star-rating star">
                                                                            <i class="fas fa-star d-inline-block"></i>
                                                                        </label>

                                                                        <!-- star 3 -->
                                                                        <input type="radio" id="3-star-rating"
                                                                            name="star-rating" value="3">
                                                                        <label for="3-star-rating"
                                                                            class="star-rating star">
                                                                            <i class="fas fa-star d-inline-block"></i>
                                                                        </label>

                                                                        <!-- star 2 -->
                                                                        <input type="radio" id="2-star-rating"
                                                                            name="star-rating" value="2">
                                                                        <label for="2-star-rating"
                                                                            class="star-rating star">
                                                                            <i class="fas fa-star d-inline-block"></i>
                                                                        </label>

                                                                        <!-- star 1 -->
                                                                        <input type="radio" id="1-star-rating"
                                                                            name="star-rating" value="1">
                                                                        <label for="1-star-rating"
                                                                            class="star-rating star">
                                                                            <i class="fas fa-star d-inline-block"></i>
                                                                        </label>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                                {{-- @endif --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ./Client Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
