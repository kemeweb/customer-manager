<!DOCTYPE html>
<html lang="el">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Customer Manager')</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #222;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 22px;
            font-weight: bold;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-button {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

    </style>

</head>

<body>

    <div class="header">

        <div class="header-title">
            Customer Manager
        </div>

        @auth

            <div class="header-user">

                <span>
                    Καλώς ήρθες, {{ Auth::user()->name }}
                </span>

                <form method="POST" action="/logout">

                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>

                </form>

            </div>

        @endauth

    </div>


    <div class="container">

        @if (isset($slot))
         {{ $slot }}
        @else
         @yield('content')
        @endif

    </div>

</body>

</html>