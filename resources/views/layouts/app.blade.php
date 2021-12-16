<html class="scroll-smooth">

<head>
    <title>document</title>
    <link href="{{ asset('./css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- nav for xl screen -->
    <aside class="min-w-[18rem] min-h-screen bg-white p-3 hidden xl:block z-30 shadow-xl ">

        <div class="sticky top-3">
            <!-- logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-4 mb-7">
                <img src="{{ asset('./logo.png') }}" alt="" class="w-14 aspect-square">
                <div class="text-xl font-bold">MVPlayer</div>
            </a>

            <!-- menu list -->
            <nav class="space-y-3">
                <!-- singer button -->
                <a href="{{ route('singers.index') }}"
                    class="flex items-center p-3 space-x-4 rounded-md hover:text-white hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 4.565 4.565zm5.309-9.867c-2.055-2.055-5.388-2.055-7.443 0-1.355 1.356-1.47 2.842-1.536 3.369l5.61 5.61c.484-.054 2.002-.169 3.369-1.536 2.056-2.055 2.056-5.388 0-7.443zm-9.834 17.94c-2.292 0-3.339 1.427-4.816 2.355-1.046.656-2.036.323-2.512-.266-.173-.211-.667-.971.174-1.842l-.125-.125-1.126-1.091c-1.372 1.416-1.129 3.108-.279 4.157.975 1.204 2.936 1.812 4.795.645 1.585-.995 2.287-2.088 3.889-2.088 1.036 0 1.98.464 3.485 2.773l1.461-.952c-1.393-2.14-2.768-3.566-4.946-3.566z" />
                    </svg>
                    <div class="text-lg font-semibold">Singer</div>
                </a>

                <!-- music button -->
                <a href="{{ route('musics.index') }}"
                    class="flex items-center p-3 space-x-4 rounded-md hover:text-white hover:bg-blue-600">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z">
                        </path>
                    </svg>
                    <div class="text-lg font-semibold">Music</div>
                </a>
            </nav>
        </div>

    </aside>

    <!-- nav for mid screen -->
    <nav
        class="w-[5rem] min-h-screen bg-white p-3 hidden sm:flex xl:hidden sm:items-center sm:flex-col  z-30 shadow-xl">
        <div class="sticky space-y-3 top-3">
            <!-- logo -->
            <a href="{{ route('home') }}" class="mb-4">
                <img src="{{ asset('./logo.png') }}" alt="" class="w-14 aspect-square">
            </a>

            <!-- singer button -->
            <a href="{{ route('singers.index') }}"
                class="grid border rounded-md shadow-md hover:shadow-none hover:border-none w-14 place-content-center aspect-square hover:text-white hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 4.565 4.565zm5.309-9.867c-2.055-2.055-5.388-2.055-7.443 0-1.355 1.356-1.47 2.842-1.536 3.369l5.61 5.61c.484-.054 2.002-.169 3.369-1.536 2.056-2.055 2.056-5.388 0-7.443zm-9.834 17.94c-2.292 0-3.339 1.427-4.816 2.355-1.046.656-2.036.323-2.512-.266-.173-.211-.667-.971.174-1.842l-.125-.125-1.126-1.091c-1.372 1.416-1.129 3.108-.279 4.157.975 1.204 2.936 1.812 4.795.645 1.585-.995 2.287-2.088 3.889-2.088 1.036 0 1.98.464 3.485 2.773l1.461-.952c-1.393-2.14-2.768-3.566-4.946-3.566z" />
                </svg>
            </a>

            <!-- music button -->
            <a href="{{ route('musics.index') }}"
                class="grid border rounded-md shadow-md hover:shadow-none hover:border-none w-14 place-content-center aspect-square hover:text-white hover:bg-blue-600">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z">
                    </path>
                </svg>
            </a>
        </div>
    </nav>

    <!-- nav for small screen -->
    <nav class="fixed bottom-0 z-30 flex h-16 min-w-full bg-white sm:hidden">
        <!-- logo -->
        <a href="{{ route('home') }}">
            <img src="{{ asset('./logo.png') }}" alt="logo"
                class="absolute w-20 -translate-x-1/2 -translate-y-1/2 rounded-full aspect-square ring-4 ring-white left-1/2">
        </a>

        <!-- menu list -->
        <div class="flex w-full">
            <!-- singer button -->
            <a href="{{ route('singers.index') }}"
                class="flex items-center w-full p-3 space-x-4 hover:text-white hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 4.565 4.565zm5.309-9.867c-2.055-2.055-5.388-2.055-7.443 0-1.355 1.356-1.47 2.842-1.536 3.369l5.61 5.61c.484-.054 2.002-.169 3.369-1.536 2.056-2.055 2.056-5.388 0-7.443zm-9.834 17.94c-2.292 0-3.339 1.427-4.816 2.355-1.046.656-2.036.323-2.512-.266-.173-.211-.667-.971.174-1.842l-.125-.125-1.126-1.091c-1.372 1.416-1.129 3.108-.279 4.157.975 1.204 2.936 1.812 4.795.645 1.585-.995 2.287-2.088 3.889-2.088 1.036 0 1.98.464 3.485 2.773l1.461-.952c-1.393-2.14-2.768-3.566-4.946-3.566z" />
                </svg>
                <div class="text-lg font-semibold">Singer</div>
            </a>

            <!-- music button -->
            <a href="{{ route('musics.index') }}"
                class="flex items-center justify-end w-full p-3 space-x-4 hover:text-white hover:bg-blue-600">
                <div class="text-lg font-semibold">Music</div>
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z">
                    </path>
                </svg>
            </a>
        </div>
    </nav>

    <!-- main content of page -->
    <div class="w-full min-h-screen p-3 sm:p-4 lg:p-8">
        @yield('content')
    </div>

    <!-- import alpine js -->
    <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>
</body>

</html>
