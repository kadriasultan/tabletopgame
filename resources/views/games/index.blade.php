
<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Games') }}</h2>
    </x-slot>

    <div class="container">
        <hr>
        <h1>Spellen</h1>

        <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>

        <ul>
            @foreach ($games as $game)
                <li>
                    <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>
                    <p>Added by: {{ $game->title }}</p>

                    <a href="{{ route('games.edit', $game->id) }}">Edit</a>

                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h1>Spellen</h1>
        @dd($games)
    </div>


</x-app-layout>
