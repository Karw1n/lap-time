@extends('layouts.app')

@section('title', 'Player Creator')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')

<form method="POST" action = "{{route('players.store')}}">
    @csrf
    <ul>
        <li>Name: <input type="text" name="name"
            value="{{old('name')}}"/></li>
        <li>Favourite Team: <input type="text" name="favourite_team"
            value="{{old('favourite_team')}}"/></li>
        <input type="submit" value="Submit"/>
    </ul>
    <a href="{{route('players.index')}}">Cancel</a>
</form>
@endsection

</body>