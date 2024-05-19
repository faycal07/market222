<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<header>

    <div class="logosec">

        <div class="p-0"><a href="{{ route('dashboard') }}"><img src="/images/logotoudja.png" alt="logo" class="p-0 m-0 h-16 w-32"></a></div>
        <img src="/images/menu.png"
            class="icn menuicn"
            id="menuicn"
            alt="menu-icon">
    </div>

    <div class="searchbar">
        <input type="text"
            placeholder="Search">
        <div class="searchbtn">
        <img src="/images/recherche.png"
                class="icn srchicn"
                alt="search-icon">
        </div>
    </div>

    <div class="message">

        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-800"> Welcome {{ Auth::user()->name }}</div>

        </div>

        <a href="{{ route('chatify.routes.prefix') }}">
            <div class=" nav-option">
                <img src="/images/discuter.png"
                    class="nav-img"
                    alt="Messages">
                <h3><a href="{{ route('chatify.routes.prefix') }}">Messagrie</a> </h3>
            </div>
        </a>



        <div class="relative inline-block text-left">
            <div>
              <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="false" aria-haspopup="true">
                {{ Auth::user()->role }}
                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" id="menu-button">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>

            <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
              <div class="py-1" role="none">

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
              </div>
            </div>
          </div>

    </div>

</header>
