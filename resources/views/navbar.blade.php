

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}">

<<<<<<< HEAD
<header class="bg-nav text-white p-4 flex justify-between items-center ">
=======
<<<<<<< HEAD
<header class="bg-nav text-white p-4 flex justify-between items-center ">
=======
<header class="bg-sky-950 text-white p-4 flex justify-between items-center">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
    <div class="flex items-center space-x-10 mx-0">
        <a href="{{ route('dashboard') }}"><img src="/images/logotoudja.png" alt="logo" class="h-16 w-32"></a>
        <img src="/images/menu.png" class="icn menuicn ml-4 h-6 w-7 cursor-pointer" id="menuicn" alt="menu-icon">

    </div>
    <div class="fixed left-56">
        <div class=" hidden md:flex items-center space-x-0 ">
            <i class="fas fa-user text-yellow-300 m-2"></i>
            <span class="font-medium text-base text-gray-100">Bonjour <span id="userName" class="text-xl text-yellow-300"></span></span>
        </div>
    </div>


    <div class="flex items-center space-x-5">


        <div id="dateTime" class="hidden lg:flex items-center space-x-2 border-solid border-2 border-white p-2  rounded-lg">
            <i class="fas fa-clock text-yellow-400 fa-flip" style="--fa-animation-duration: 10s;"></i>
            <span class="font-medium text-sm text-gray-100"></span>
        </div>

        <a href="{{ route('chatify.routes.prefix') }}" class="flex items-center bg-gradient-to-br from-sky-900 via-sky-600 to-yellow-600 hover:from-yellow-500 hover:via-sky-900 hover:to-yellow-500 focus:ring-4 focus:outline-none focus:ring-teal-300 shadow-lg shadow-teal-500/50 dark:shadow-xl dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-3 py-2 text-white transition-all duration-300 ease-in-out">
            <i class="fa-regular fa-comments"></i>
                        <span class="ml-2 hidden lg:block">Messagerie</span>
        </a>

        <div class="relative inline-block text-left">


            <div class="relative">
                <img class="w-12 h-17 rounded-full"  id="menu-button" src="{{ asset('storage/photos/' . Auth::user()->photo) }}"  alt="phto profile">
                <span class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
            </div>

<<<<<<< HEAD
            <div class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-sky-950 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
=======
<<<<<<< HEAD
            <div class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-sky-950 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
=======
            <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                <div class="py-1" role="none">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Déconnexion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    const userName = @json(Auth::user()->name);

    document.addEventListener('DOMContentLoaded', function () {
        const userNameContainer = document.getElementById('userName');
        userName.split('').forEach((letter, index) => {
            const span = document.createElement('span');
            span.classList.add('letter');
            span.textContent = letter;
            userNameContainer.appendChild(span);
            setTimeout(() => {
                span.classList.add('show');
            }, index * 200);
        });

        function updateDateTime() {
            const now = new Date();
            const formattedDateTime = now.toLocaleString();
            document.getElementById('dateTime').querySelector('span').innerText = formattedDateTime;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    });
</script>

