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

            @if(auth()->check() && auth()->user()->role === 'marketing')
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
            @endif

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
