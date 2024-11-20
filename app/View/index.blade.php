@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Games</h1>

        <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>

        <ul>
            @foreach ($games as $game)
                <li>
                    <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>
                    <p>Added by: {{ $game->user->name }}</p>

                    <a href="{{ route('games.edit', $game->id) }}">Edit</a>

                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
