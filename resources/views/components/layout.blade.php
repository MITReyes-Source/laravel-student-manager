<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Manager</title>
</head>
<body>
    <nav>
        @auth
            <span>Logged in as {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Log out</button>
            </form>
        @else
            <a href="{{ route('login') }}">Log in</a>
        @endauth
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
