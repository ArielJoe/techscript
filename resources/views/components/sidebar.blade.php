@php
    use App\Enums\RoleEnum;
@endphp

<div id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-deep-teal sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-3 overflow-y-auto">
        <!-- Sidebar Toggle Buttons -->
        <div class="flex justify-between items-center">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button" aria-label="Toggle sidebar"
                class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-teal-cyan focus:outline-none focus:ring-2 focus:ring-light-cyan">
                <span class="sr-only">Toggle sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Close sidebar</title>
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>

        <ul class="space-y-2 font-medium">
            @foreach ($navItems as $item)
                @if (empty($item['children']))
                    <li>
                        <a href="{{ !is_null($item['route']) && Route::has($item['route']) ? route($item['route']) : '#' }}"
                            class="flex items-center p-2 rounded-lg text-white hover:bg-teal-cyan transition-colors duration-200
                                {{ in_array(request()->route()->getName(), $item['activeRoutes']) ? 'bg-teal-cyan' : '' }}">
                            @if ($item['icon'] === 'ri-dashboard-fill')
                                <i class="bi bi-speedometer w-6 h-6 text-white"></i>
                                {{-- <x-ri-dashboard-fill class="w-6 h-6 text-white" /> --}}
                            @elseif ($item['icon'] === 'solar-letter-bold')
                                <i class="bi bi-envelope w-6 h-6 text-white"></i>
                                {{-- <x-solar-letter-bold class="w-6 h-6 text-white" /> --}}
                            @elseif ($item['icon'] === 'heroicon-s-user')
                                <i class="bi bi-person w-6 h-6 text-white"></i>
                                {{-- <x-heroicon-s-user class="w-6 h-6 text-white" /> --}}
                            @elseif ($item['icon'] === 'ri-history-fill')
                                <i class="bi bi-clock-history w-6 h-6 text-white"></i>
                                {{-- <x-ri-history-fill class="w-6 h-6 text-white" /> --}}
                            @endif
                            <span class="ml-3 text-md">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <button type="button"
                            class="flex items-center p-2 mb-2 w-full rounded-lg text-white hover:bg-teal-cyan transition-colors duration-200
                                {{ in_array(request()->route()->getName(), $item['activeRoutes']) ? 'bg-teal-cyan' : '' }}"
                            aria-controls="{{ $item['dropdownId'] }}" data-collapse-toggle="{{ $item['dropdownId'] }}"
                            aria-expanded="{{ in_array(request()->route()->getName(), $item['activeRoutes']) ? 'true' : 'false' }}">
                            @if ($item['icon'] === 'solar-letter-bold')
                                <i class="bi bi-envelope w-6 h-6 text-white"></i>
                                {{-- <x-solar-letter-bold class="w-6 h-6 text-white" /> --}}
                            @elseif ($item['icon'] === 'heroicon-s-user')
                                <i class="bi bi-person w-6 h-6 text-white"></i>
                                {{-- <x-heroicon-s-user class="w-6 h-6 text-white" /> --}}
                            @endif
                            <span class="flex-1 ml-3 text-left text-md whitespace-nowrap">{{ $item['label'] }}</span>
                            <svg class="w-5 h-5 text-white transition-transform duration-300 chevron"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="{{ $item['dropdownId'] }}" class="hidden mt-1 space-y-2 bg-deep-teal">
                            @foreach ($item['children'] as $child)
                                <li class="pl-7">
                                    <a href="{{ !is_null($child['route']) && Route::has($child['route']) ? route($child['route']) : '#' }}"
                                        class="flex items-center py-2 px-4 rounded-lg text-white hover:bg-teal-cyan transition-colors duration-200
                                            {{ request()->routeIs($child['route']) ? 'bg-teal-cyan' : '' }}">
                                        <span class="text-md">{{ $child['label'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dropdown toggle
        const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');
        dropdownButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const dropdownId = this.getAttribute('data-collapse-toggle');
                const dropdown = document.getElementById(dropdownId);
                const chevron = this.querySelector('.chevron'); // Target the chevron class

                if (dropdown && chevron) {
                    dropdown.classList.toggle('hidden');
                    chevron.classList.toggle('rotate-180');
                } else {
                    console.error(`Dropdown with ID ${dropdownId} not found`);
                }
            });
        });

        // Open active dropdowns
        const activeRoute = '{{ request()->route()->getName() }}';
        const navItems = @json($navItems);
        navItems.forEach(item => {
            if (item.children && item.activeRoutes.includes(activeRoute)) {
                const dropdownId = item.dropdownId;
                const dropdown = document.getElementById(dropdownId);
                const button = document.querySelector(`[data-collapse-toggle="${dropdownId}"]`);
                const chevron = button?.querySelector('.chevron'); // Target the chevron class

                if (dropdown && chevron) {
                    dropdown.classList.remove('hidden');
                    chevron.classList.add('rotate-180');
                }
            }
        });

        // Mobile sidebar toggle
        const sidebarToggle = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
        const sidebar = document.getElementById('logo-sidebar');
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    });
</script>
