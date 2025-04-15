<div class="sm:ml-64">
    <nav class="w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <!-- Left Section: Sidebar Toggle and Logo -->
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex ms-2 md:me-24">
                        <!-- Uncommented and added a placeholder logo; replace with your logo -->
                        <img src="{{ asset('tslogo.png') }}" class="h-8 me-3" alt="TechScript Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">TechScript</span>
                    </a>
                </div>
                <!-- Right Section: Notifications and User Dropdown -->
                <div class="flex items-center">
                    <!-- Notification Icon (assuming a simple SVG placeholder if x-zondicon isn't available) -->
                    <div class="relative">
                        <!-- Tombol Notifikasi -->
                        @php
                            use App\Models\User;

                            $user = User::where('id', Auth::id())->first();
                        @endphp
                        @if ($user->role !== 1)
                            <button id="notifButton" onclick="toggleNotif(event)"
                                class="cursor-pointer p-2 text-gray-500 hover:text-gray-900 focus:outline-none">
                                <span class="sr-only">Notifications</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </button>

                            <!-- Dropdown Notifikasi -->
                            <div id="notifDropdown"
                                class="hidden absolute right-0 mt-2 w-[15rem] md:w-[22rem] bg-white rounded-lg shadow-lg p-4 z-50">
                                <h4 class="text-gray-800 font-semibold mb-2">Notifikasi</h4>
                                <ul>
                                    @forelse (auth()->user()->unreadNotifications as $notif)
                                        <li class="flex items-start text-sm text-gray-700 mb-3">
                                            <!-- Bulatan + Ikon -->
                                            <div
                                                class="w-5 h-5 flex items-center justify-center rounded-full bg-light-cyan/50 mr-3">
                                                <svg class="w-5 h-5 text-teal-cyan" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <!-- Isi Notifikasi -->
                                            <div class="flex flex-col">
                                                <span>{{ $notif->data['message'] }}</span>
                                                <span
                                                    class="text-xs text-gray-500">{{ $notif->created_at->diffForHumans() }}</span>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="text-sm text-gray-500">Tidak ada notifikasi terbaru</li>
                                    @endforelse
                                </ul>
                            </div>
                        @endif
                    </div>

                    <script>
                        function toggleNotif(event) {
                            const dropdown = document.getElementById('notifDropdown');
                            dropdown.classList.toggle('hidden');
                            event.stopPropagation(); // Mencegah event bubble agar tidak menutup dropdown langsung
                        }

                        // Menutup dropdown ketika klik di luar
                        document.addEventListener('click', function(event) {
                            const dropdown = document.getElementById('notifDropdown');
                            const button = document.getElementById('notifButton');

                            // Cek apakah klik berada di luar dropdown dan tombol
                            if (!dropdown.contains(event.target) && event.target !== button) {
                                dropdown.classList.add('hidden'); // Menyembunyikan dropdown
                            }
                        });
                    </script>





                    {{-- <form action="{{ route('send.notification') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary">Kirim Notifikasi</button>
                    </form>
                
                    @foreach (auth()->user()->notifications as $notification)
                        <div class="alert alert-info">
                            {{ $notification->data['message'] }}
                        </div>
                    @endforeach --}}
                    <!-- User Dropdown -->
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://i.pinimg.com/1200x/2c/47/d5/2c47d5dd5b532f83bb55c4cd6f5bd1ef.jpg"
                                    alt="user photo" />
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    @auth
                                        {{ Auth::user()->email }}
                                    @else
                                        Guest
                                    @endauth
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    @auth
                                        <form method="POST" action="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
                                            role="menuitem">
                                            @csrf
                                            <button type="submit" class="w-full text-left">Sign out</button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Sign in</a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Flowbite Script (Updated to a newer version) -->
<script src="https://unpkg.com/flowbite@1.8.1/dist/flowbite.min.js"></script>
