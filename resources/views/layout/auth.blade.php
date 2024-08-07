<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>App</title>

    @livewireStyles

    <style>
        html,
        body {
            height: 100%;
            background-color: #eeeeee;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;

        }
    </style>
</head>

<body>

    <div class="container h-100">
        <div class="card shadow-sm">
            {{ $slot }}
        </div>
    </div>


    <footer class="d-flex  flex-wrap align-items-center py-3">
        <div class="col d-flex align-items-center justify-content-end pe-4">
            <span style="font-size: 12px" class=" mb-md-0 text-body-secondary"> Designed by Mirsolikh Usmonov <br>
                salih.usmanovv@gmail.com</span>

        </div>
    </footer>

    @livewireScripts
</body>

</html>
