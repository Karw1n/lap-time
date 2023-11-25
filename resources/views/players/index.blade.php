@extends('layouts.playerapp')

@section('title', 'Players')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')
    <p>Players</p>
    <p><a href="{{route('players.create')}}">Create a Player</a></p>
    <ul>
        @foreach ($players as $player)
            <li><a href="{{route('players.show', ['id' => $player->id])}}">
                {{$player->name}}</a></li>
        @endforeach
    </ul>
@endsection

</body>