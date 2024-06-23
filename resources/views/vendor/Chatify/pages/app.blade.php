@include('Chatify::layouts.headLinks')

<body>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}">

<<<<<<< HEAD
    <header class="bg-nav text-white p-4 flex justify-between items-center">
=======
<<<<<<< HEAD
    <header class="bg-nav text-white p-4 flex justify-between items-center">
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
                <i class="fas fa-user text-yellow-400 m-2"></i>
                <span class="font-medium text-base text-gray-200">Bonjour <span id="userName" class="text-xl text-yellow-400"></span></span>
            </div>
        </div>


        <div class="flex items-center space-x-5">


            <div id="dateTime" class="hidden lg:flex items-center space-x-2 border-solid border-2 border-white p-2  rounded-lg">
                <i class="fas fa-clock text-yellow-400"></i>
                <span class="font-medium text-sm text-gray-100"></span>
            </div>

            <a href="{{ route('dashboard') }}" class="flex items-center bg-gradient-to-br from-sky-900 via-sky-600 to-yellow-600 hover:from-yellow-500 hover:via-sky-900 hover:to-yellow-500 focus:ring-4 focus:outline-none focus:ring-teal-300 shadow-lg shadow-teal-500/50 dark:shadow-xl dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-3 py-2 text-white transition-all duration-300 ease-in-out">
                <i class="fa-solid fa-house-chimney"></i>
                <span class="ml-2 hidden lg:block">Dashboard</span>
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



<div class="messenger">


    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView  {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header" >
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Rechercher" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">

            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title"><span>Favoris</span></p>
                <div class="messenger-favorites app-scroll-hidden"></div>
               </div>
               {{-- Saved Messages --}}
               <p class="messenger-title"><span>Mon Espace</span></p>
               {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
               {{-- Contact --}}
               <p class="messenger-title"><span>All Messages</span></p>
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
           </div>
             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab search-tab app-scroll" data-view="search">

                <p class="messenger-title"><span>Search</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite">Favori<i class="fas fa-star"></i></a>
                    {{-- <a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a> --}}
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connecté</span>
                <span class="ic-connecting">Connexion...</span>
                <span class="ic-noInternet">Pas d'accès Internet</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Veuillez sélectionner une discussion pour commencer à envoyer des messages</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <p>Détails Utilisateurs</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
 <script>
 let menuicn = document.querySelector(".menuicn");
    let nav = document.querySelector(".navcontainer");

    menuicn.addEventListener("click", () => {
        nav.classList.toggle("navclose");
    })
    // JavaScript for Dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('dropdown');
        const dropdownContent = dropdown.querySelector('.dropdown-content');

        dropdown.querySelector('.dpicn').addEventListener('click', function() {
            dropdownContent.classList.toggle('show');
        });
    });

    // Get the button element
    document.addEventListener("DOMContentLoaded", function() {
          const menuButton = document.getElementById("menu-button");
          const dropdownMenu = document.getElementById("dropdown-menu");

          // Toggle dropdown menu
          menuButton.addEventListener("click", function() {
            const expanded = this.getAttribute("aria-expanded") === "true" || false;
            this.setAttribute("aria-expanded", !expanded);
            dropdownMenu.classList.toggle("hidden");
          });

          // Close dropdown menu when clicking outside
          document.addEventListener("click", function(event) {
            if (!dropdownMenu.contains(event.target) && event.target !== menuButton) {
              dropdownMenu.classList.add("hidden");
              menuButton.setAttribute("aria-expanded", "false");
            }
          });
        });

        function scrollToForm() {
            document.getElementById('user-form').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('user-form').classList.remove('hidden');
        }
        function scrollToStart() {
        document.getElementById('main').scrollIntoView({ behavior: 'smooth' });
        setTimeout(function() {
                document.getElementById('user-form').classList.add('hidden');
            }, 1000);
    }

        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('user-form').addEventListener('submit', function(event) {
            // Prevent the default form submission behavior


            // Set a timeout to add the 'hidden' class after 1 second
            setTimeout(function() {
                document.getElementById('user-form').classList.add('hidden');
            }, 1000);
        });
    });
    </script>
</body>
