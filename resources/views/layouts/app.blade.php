<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YOU CAN.T') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="resources/css/bootstrap.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.conditional.min.css"> --}}

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=more_vert" />

    <style>
        * {
            /* font-size: 1em !important; */
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            position: absolute;
            display: none;
            min-width: 160px;
            padding: 12px 16px;
            z-index: 1;
            /* z-index: 20; */
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
        }

        .large-icon {
            font-size: 48px;
            /* Increase or decrease as needed */
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- @section('content') --}}

<body class="font-sans antialiased bg-blue-200 dark:bg-slate-950">
    <div class="z-100 fixed w-full flex justify-center">
        @include('layouts.navigation')
    </div>
    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    </div>

    {{-- @endsection --}}
    <script>
        const toggleButton = document.getElementById('theme-toggle');
        const toggleButton1 = document.getElementById('theme-toggle1');
        const htmlElement = document.documentElement;

        // Load the saved theme from localStorage or default to light
        const storedTheme = localStorage.getItem('theme') || 'light';
        if (storedTheme === 'dark') {
            htmlElement.classList.add('dark');
        } else {
            htmlElement.classList.remove('dark');
        }

        // Toggle theme on button click
        toggleButton.addEventListener('click', () => {
            const isDark = htmlElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
        toggleButton1.addEventListener('click', () => {
            const isDark = htmlElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    </script>
    <script>
        flatpickr("#datetime", {
            enableTime: true,
            dateFormat: "d-m-Y H:i",
            theme: "dark",
        });
    </script>
    <script>
        // function toggleDropdown() {
        //     const dropdown = document.getElementById('dropdownDefaultRadio');
        //     dropdown.classList.toggle('hidden');
        // }

        var priorityDropdown = document.getElementById('priorityDropdown');
        var priorityButton = document.getElementById('priorityButton');

        priorityButton.addEventListener('click', function() {
            priorityDropdown.style.display = (priorityDropdown.style.display === 'none' ? 'block' : 'none');
        });

        document.addEventListener('click', function(event) {
            if (priorityDropdown.style.display == 'block') {
                // Check if the clicked element is outside the button and dropdown
                if (!priorityDropdown.contains(event.target) && !priorityButton.contains(event.target)) {
                    priorityDropdown.style.display = 'none';
                }
            }
        });
    </script>



    <script>
        var message = document.getElementById('message');
        setTimeout(() => {
            message.style.display = 'none';
        }, 3000);
    </script>

    <script>
        var published = document.getElementById('published');
        setTimeout(() => {
            published.style.display = 'none';
        }, 3000);
    </script>
</body>

</html>
