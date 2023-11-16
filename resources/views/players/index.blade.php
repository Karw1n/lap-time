@extends('layouts.app')

@section('title', 'Players')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')
    <p>Players</p>
    <ul>
        @foreach ($players as $player)
            <li>{{ $player->name }}</li>
        @endforeach
    </ul>
@endsection

</body>