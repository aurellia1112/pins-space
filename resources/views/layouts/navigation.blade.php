<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo + Navigation -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}"
                       class="font-bold text-red-600 text-2xl">
                        📌 Pinspace
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-8">

                    <x-nav-link
                        :href="route('home')"
                        :active="request()->routeIs('home')"
                    >
                        Home
                    </x-nav-link>

                

                </div>

            </div>


            <!-- User Dropdown / Guest Auth -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:gap-2">

                @auth

                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2
                                border border-transparent
                                text-sm leading-4 font-medium
                                rounded-full text-gray-700 bg-gray-100
                                hover:bg-gray-200
                                focus:outline-none transition"
                            >

                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="ms-1">

                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>

                                </div>

                            </button>

                        </x-slot>


                        <x-slot name="content">

                            <!-- Logout -->
                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >

                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                    class="text-red-600 font-semibold"
                                >
                                    🚪 Logout
                                </x-dropdown-link>

                            </form>

                        </x-slot>

                    </x-dropdown>

                @else

                    <a
                        href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 rounded-full hover:bg-gray-100 transition"
                    >
                        Masuk
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="px-4 py-2 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-full shadow-sm transition"
                    >
                        Daftar
                    </a>

                @endauth

            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center
                    p-2 rounded-md text-gray-400
                    hover:text-gray-500 hover:bg-gray-100
                    focus:outline-none transition"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{
                                'hidden': open,
                                'inline-flex': ! open
                            }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{
                                'hidden': ! open,
                                'inline-flex': open
                            }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div
        :class="{
            'block': open,
            'hidden': ! open
        }"
        class="hidden sm:hidden"
    >

        <!-- Navigation -->
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('home')"
                :active="request()->routeIs('home')"
            >
                Home
            </x-responsive-nav-link>


            <x-responsive-nav-link
                :href="route('pins.create')"
                :active="request()->routeIs('pins.create')"
            >
                + Tambahkan Pin
            </x-responsive-nav-link>

        </div>


        <!-- User / Guest Actions -->
        @auth

            <div class="pt-4 pb-1 border-t border-gray-200">

                <div class="px-4">

                    <div class="font-medium text-base text-gray-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>

                </div>


                <div class="mt-3 space-y-1">

                    <!-- Logout -->
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <x-responsive-nav-link
                            :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();"
                            class="text-red-600 font-semibold"
                        >
                            🚪 Logout
                        </x-responsive-nav-link>

                    </form>

                </div>

            </div>

        @else

            <div class="pt-3 pb-4 px-4 space-y-2 border-t border-gray-100">

                <a
                    href="{{ route('login') }}"
                    class="block text-center w-full py-2 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-full transition"
                >
                    Masuk
                </a>

                <a
                    href="{{ route('register') }}"
                    class="block text-center w-full py-2 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-full transition"
                >
                    Daftar
                </a>

            </div>

        @endauth

    </div>

</nav>