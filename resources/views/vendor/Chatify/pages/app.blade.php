@include('Chatify::layouts.headLinks')

<body>
<header>

    <div class="logosec">

        <div class="p-0"><a href="{{ route('dashboard') }}"><img style="height: 80px" src="/images/logotoudja.png" alt="logo" class="p-0 m-0 h-16 w-32"></a></div>

    </div>



    <div class="message">

        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-800"> Welcome {{ Auth::user()->name }}</div>

        </div>

       <div>
        <a href="{{ route('profile.edit') }}" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            {{ __('Profile') }}
        </a>

    </div>


            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit">
                     <img src="/images/logout.png"
                    class="nav-img"
                    alt="logout">
                </button>
            </form>



              </div>
            </div>
          </div>

    </div>

</header>


<div class="messenger">

    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title"><span>Favorites</span></p>
                <div class="messenger-favorites app-scroll-hidden"></div>
               </div>
               {{-- Saved Messages --}}
               <p class="messenger-title"><span>Your Space</span></p>
               {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
               {{-- Contact --}}
               <p class="messenger-title"><span>All Messages</span></p>
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
           </div>
             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
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
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
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
            <p>User Details</p>
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
