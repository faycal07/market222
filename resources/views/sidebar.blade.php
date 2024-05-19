<div class="navcontainer">
    <nav class="nav">
        <div class="nav-upper-options">
            <a href="{{ route('dashboard') }}">
                 <div class="nav-option option1">
                <img src="/images/dashboard.png"
                    class="nav-img"
                    alt="dashboard">
                <h3><a href="{{ route('dashboard') }}">Dashboard</a> </h3>
            </div>
        </a>

        @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('users.index') }}">
            <div class="option2 nav-option">
                <img src="/images/menuusers.png" class="nav-img" alt="Utilisateurs">
                <h3><a href="{{ route('users.index') }}">Utilisateurs</a></h3>
            </div>
        </a>
    @endif


        <a href="{{ route('emails.index') }}">
            <div class="option2 nav-option">
                <img src="/images/email.png"
                    class="nav-img"
                    alt="Emails">
                <h3><a href="{{ route('emails.index') }}">Emails</a> </h3>
            </div>
        </a>


        <a href="{{route('opportunites.index')}}" >
            <div class="nav-option ">
                <img src="/images/opportunites.png"
                    class="nav-img"
                    alt="Opportunités">
                <h3><a href="{{route('opportunites.index')}}" >Opportunités</a></h3>
            </div>
        </a>

        <a href="{{route('pageleads')}}" >
            <div class="nav-option ">
                <img src="/images/leader.png"
                    class="nav-img"
                    alt="Leads">
                <h3><a href="{{route('pageleads')}}" >Leads</a></h3>
            </div>
        </a>

        <a href="{{route('compagnes.index')}}">
            <div class="nav-option ">
                <img src="/images/marketing.png"
                    class="nav-img"
                    alt="Compagnes">
                <h3><a href="{{route('compagnes.index')}}">Compagnes</a></h3>
            </div>
        </a>

        <a href="{{route('workflows.index')}}">
             <div class="nav-option option6">
            <img src="/images/workflow.png"
                class="nav-img"
                alt="Workflows">
            <h3><a href="{{route('workflows.index')}}">Workflows</a></h3>
        </div>
       </a>



            <div class="nav-option logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">
                         <img src="/images/logout.png"
                        class="nav-img"
                        alt="logout">
                    </button>
                </form>

                <h3><form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">Logout</button>
                </form></h3>
            </div>
        </div>
    </nav>
</div>
