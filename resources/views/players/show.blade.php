@extends('layouts.playerapp')

@section('title', 'Detail')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')
    <ul>
        <li>Name: {{$player->name}}</li>
        <li>Favourite Team: {{$player->favourite_team}}</li>
    </ul>

    <form method="POST"
        action="{{ route('players.destroy', ['id' => $player->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection

</body>