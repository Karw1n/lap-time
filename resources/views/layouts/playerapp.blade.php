<!doctype HTML>

<head>
    <title>Best Lap @yield('title')</title>
</head>


<body>
    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <div>
        @yield('content')
    </div>
</body>