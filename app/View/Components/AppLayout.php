<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
</head>
<body>
<header>
    <!-- Navigatie voor ingelogde gebruikers -->
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('games.index') }}">Games</a>
        <!-- Meer navigatie links -->
    </nav>
</header>

<main>
    @yield('content')  <!-- Dit is waar je content uit andere views wordt geladen -->
</main>

<footer>
    <!-- Footer content -->
</footer>
</body>
</html>

