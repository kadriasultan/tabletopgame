<nav>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li> <!-- Link naar de home pagina -->
        <li><a href="{{ route('games.index') }}">Spellen</a></li> <!-- Link naar de lijst van games -->

        @auth
            <li><a href="{{ route('games.create') }}">Add Game</a></li> <!-- Link om een game toe te voegen (alleen zichtbaar voor ingelogde gebruikers) -->
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li> <!-- Uitloggen -->

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <li><a href="{{ route('login') }}">Login</a></li> <!-- Link naar de inlogpagina als je niet ingelogd bent -->
            <li><a href="{{ route('register') }}">Register</a></li> <!-- Link naar de registratiepagina -->
        @endauth
    </ul>
</nav>
