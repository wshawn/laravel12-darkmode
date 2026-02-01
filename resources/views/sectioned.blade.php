<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @vite(['resources/js/darkToggleRegisterElements.js'])
    <title>{{ $title ?? 'App' }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white text-slate-900 dark:bg-slate-900 dark:text-slate-100">
<div class="min-h-screen flex flex-col">
    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}"
                   class="text-lg font-semibold hover:text-blue-600 dark:hover:text-amber-400">{{ config('app.name_short', 'Laravel') }}</a>
                <nav class="hidden md:flex space-x-3 text-sm">
                    <a href="#" class=" hover:text-blue-600 dark:hover:text-amber-400 hover:underline">Home</a>
                    <a href="#" class=" hover:text-blue-600 dark:hover:text-amber-400 hover:underline">Link 1</a>
                    <a href="#" class=" hover:text-blue-600 dark:hover:text-amber-400 hover:underline">Link 2</a>
                </nav>
            </div>
            <div class="flex items-center space-x-3">
                <button id="theme-toggle" aria-label="Toggle color theme"
                        class="p-2 rounded-md border border-slate-200 dark:border-slate-700">
                    <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 22 22"
                         fill="currentColor">
                        <path fill="currentColor" d="M18 12a6 6 0 1 1-12 0a6 6 0 0 1 12 0"/>
                        <path fill="currentColor" fill-rule="evenodd"
                              d="M12 1.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-1.5 0V2a.75.75 0 0 1 .75-.75M4.399 4.399a.75.75 0 0 1 1.06 0l.393.392a.75.75 0 0 1-1.06 1.061l-.393-.393a.75.75 0 0 1 0-1.06m15.202 0a.75.75 0 0 1 0 1.06l-.393.393a.75.75 0 0 1-1.06-1.06l.393-.393a.75.75 0 0 1 1.06 0M1.25 12a.75.75 0 0 1 .75-.75h1a.75.75 0 0 1 0 1.5H2a.75.75 0 0 1-.75-.75m19 0a.75.75 0 0 1 .75-.75h1a.75.75 0 0 1 0 1.5h-1a.75.75 0 0 1-.75-.75m-2.102 6.148a.75.75 0 0 1 1.06 0l.393.393a.75.75 0 1 1-1.06 1.06l-.393-.393a.75.75 0 0 1 0-1.06m-12.296 0a.75.75 0 0 1 0 1.06l-.393.393a.75.75 0 1 1-1.06-1.06l.392-.393a.75.75 0 0 1 1.061 0M12 20.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-1.5 0v-1a.75.75 0 0 1 .75-.75"
                              clip-rule="evenodd"/>
                    </svg>
                    <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 116.707 2.707 7 7 0 1017.293 13.293z"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    @hasSection('breadcrumbs')
        <div class="flex text-center">
            @yield('breadcrumbs')
        </div>
    @endif
    <main class="p-6 flex-1">

        <div class="bg-white dark:bg-black">
            <div class="bg-white dark:bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5">
                <div>
    <span class="inline-flex items-center justify-center rounded-md bg-indigo-500 p-2 shadow-lg">
    </span>
                    <h1 class="text-gray-900 dark:text-amber-600 mt-5 text-base font-medium tracking-tight ">Test</h1>
                    <a href="#"
                       class="text-blue-500 hover:text-green-600 dark:text-amber-300 dark:hover:text-amber-700 transition-colors duration-300">Hoverable
                        Link</a>

                </div>
                <h3 class="text-gray-900 dark:text-white mt-5 text-base font-medium tracking-tight ">Writes
                    upside-down</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

            </div>
        </div>


    </main>
</div>
@vite(['resources/js/app.js'])
@vite(['resources/js/darkToggleListeners.js'])
</body>
</html>
