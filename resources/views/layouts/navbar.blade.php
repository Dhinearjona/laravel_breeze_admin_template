<nav
    class="block w-11/12 mx-auto bg-white bg-opacity-90 sticky top-3 shadow lg:px-8 lg:py-3 backdrop-blur-lg backdrop-saturate-150 z-[9999]">
    <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
        <a href="{{ $link }}" class="block px-4 py-2 font-bold uppercase">
            {{ $name }}
        </a>
        <div class="flex items-center gap-6">
            @auth
                <div class="relative" x-data="{ open: false }">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Profile" class="w-10 rounded-full cursor-pointer"
                        @click="open = !open">
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
            <button
                class="lg:hidden relative h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button" x-data="{ open: false }" @click="open = !open">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</nav>