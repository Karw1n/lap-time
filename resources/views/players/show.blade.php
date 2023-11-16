@extends('layouts.app')

@section('title', 'Detail')

<body>
    <h1> Best Laps - @yield('title')</h1>

@section('content')
    <p>{{$player->name}}</p>
@endsection

</body>