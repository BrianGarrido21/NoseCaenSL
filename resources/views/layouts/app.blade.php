<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ce0104188e.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

        <!-- Sidebar -->
        <!-- Sidebar -->

        <aside
            class="w-72 bg-gray-800 shadow-md min-h-screen p-6 text-white border-r border-gray-100 dark:border-gray-700"">

            <!-- Logo -->
            <div class="shrink-0 flex items-center mb-8">
                <a href="{{ route('employee.dashboard') }}">
                    <x-application-logo class="block h-12 w-auto fill-current text-white" />
                </a>
            </div>

            <!-- Navigation Links -->
            <nav>
                <ul class="space-y-4">

                    @if (Auth::guard('employee')->user()->can('read task'))
                        <li>
                            <a href="{{ route('task.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fas fa-tasks"></i> {{ __('Tasks') }}
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard('employee')->user()->can('read fee'))
                        <li>
                            <a href="{{ route('fee.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fas fa-dollar-sign"></i> {{ __('Fees') }}
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard('employee')->user()->can('read employee'))
                        <li>
                            <a href="{{ route('employee.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fa-solid fa-user-tie"></i> {{ __('Employees') }}
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard('employee')->user()->can('read status'))
                        <li>
                            <a href="{{ route('status.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fas fa-info-circle"></i> {{ __('Statuses') }}
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard('employee')->user()->can('read role'))
                        <li>
                            <a href="{{ route('role.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fas fa-user-shield"></i> {{ __('Roles') }}
                            </a>
                        </li>
                    @endif

                    @if (Auth::guard('employee')->user()->can('read user'))
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="flex items-center gap-3 text-lg font-medium p-3 rounded-lg hover:bg-gray-700">
                                <i class="fas fa-user"></i> {{ __('Users') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="p-6">
                    {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <livewire:scripts />
</body>

</html>
