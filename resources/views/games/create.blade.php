@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Game</h1>

        <form action="{{ route('games.store') }}" method="POST">
            @csrf <!-- Token voor beveiliging -->
            <div class="mb-3">
                <label for="title" class="form-label">Game Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Game</button>
        </form>
    </div>
@endsection
