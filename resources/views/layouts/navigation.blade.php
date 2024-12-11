<div class="flex antialiased bg-gray-50 text-gray-800 h-screen">
    <button id="drawer-toggle" class="p-3 text-white bg-red-700 rounded-lg fixed top-4 right-4 z-50 md:hidden">
        <i id="drawer-icon" class='bx bx-menu-alt-right text-xl'></i>
    </button>

    <div id="drawer"
        class="fixed flex flex-col w-64 max-w-[20rem] rounded-xl bg-white bg-clip-border p-4 text-gray-700 shadow-xl shadow-blue-gray-900/5 h-full">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin_dashboard') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-10 me-2">
            </a>
            <div class="font-bold uppercase">
                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                <br />
                <span class="text-sm font-normal">
                    ({{ Auth::user()->role }})
                </span>
            </div>
        </div>
        <hr class="my-4">
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
            <ul class="flex flex-col py-4 space-y-1">
                @if (Auth::user()->role == 'Admin')
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 {{ Route::currentRouteName() == 'admin.dashboard' ? 'border-yellow-500 bg-gray-50 text-gray-800' : 'border-transparent' }} pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class='bx bxs-dashboard text-xl'></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li x-data="{ open: false }">
                        <a href="{{ route('admin.dashboard1') }}"
                            class="transition-all duration-300 ease-in-out flex items-center justify-between w-full p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-50 border-l-4 border-transparent cursor-pointer"
                            @click.prevent="open = !open">
                            <span class="inline-flex items-center">
                                <i class='bx bxs-report text-xl'></i>
                                <span class="ml-2 text-sm tracking-wide truncate">Dashboards</span>
                            </span>
                            <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'" class="ml-auto"></i>
                        </a>
                        <ul x-show="open"
                            class="transition-all duration-300 ease-in-out bg-white shadow-lg rounded-lg mt-1 w-full">
                            <li>
                                <a href="{{ route('admin.dashboard1') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Route::currentRouteName() == 'admin.dashboard1' ? 'bg-gray-100 border-l-4 border-yellow-500' : '' }}">
                                  Dashboards 1
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.dashboard2') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ Route::currentRouteName() == 'admin.dashboard2' ? 'bg-gray-100 border-l-4 border-yellow-500' : '' }}">
                                    Dashboards 2
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
