<div class="navcontainer">
    <nav class="nav">
        <div class="nav-upper-options">
            <a href="{{ route('dashboard') }}" class="nav-option option1">
                <i class="fa-solid fa-chart-line px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                <h3>Dashboard</h3>
            </a>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="option2 nav-option">
                    <i class="fa-solid fa-users px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                    <h3>Utilisateurs</h3>
                </a>
            @endif

            <a href="{{ route('emails.index') }}" class="option2 nav-option">
                <i class="fa-solid fa-envelope px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                <h3>Emails</h3>
            </a>

<<<<<<< HEAD
            {{-- @if(auth()->check() && auth()->user()->role === 'marketing') --}}
=======
<<<<<<< HEAD
            {{-- @if(auth()->check() && auth()->user()->role === 'marketing') --}}
=======
            @if(auth()->check() && auth()->user()->role === 'marketing')
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                <a href="{{ route('opportunites.index') }}" class="nav-option">
                    <i class="fas fa-tasks fa-flip px-2" style="--fa-animation-duration: 10s;"></i>
                    <h3>Opportunités</h3>
                </a>

                <a href="{{ route('pageleads') }}" class="nav-option">
                    <i class="fa-solid fa-arrows-down-to-people fa-flip px-2" style="--fa-animation-duration: 10s;"></i>
                    <h3>Leads</h3>
                </a>

                <a href="{{ route('compagnes.index') }}" class="nav-option">
                    <i class="fa-solid fa-envelopes-bulk px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                    <h3>Compagnes</h3>
                </a>

                <a href="{{ route('workflows.index') }}" class="nav-option option6">
                    <i class="fa-solid fa-timeline px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                    <h3>Workflows</h3>
                </a>
<<<<<<< HEAD
            {{-- @endif --}}
=======
<<<<<<< HEAD
            {{-- @endif --}}
=======
            @endif
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-option logout">
                    <i class="fa-solid fa-right-from-bracket px-2 fa-flip" style="--fa-animation-duration: 10s;"></i>
                    <h3>Déconnexion</h3>
                </button>
            </form>
        </div>
    </nav>
</div>
