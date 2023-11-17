@extends('layouts.app')

@section('title', 'Detail')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')
    <ul>
        <li>Name: {{$player->name}}</li>
        <li>Favourite Team: {{$player->favourite_team}}</li>
    </ul>
@endsection

</body>