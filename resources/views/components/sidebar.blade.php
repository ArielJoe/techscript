<div id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-deep-teal sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-3 overflow-y-auto">
        <!-- Sidebar Toggle Buttons -->
        <div class="flex justify-between items-center">
            <!-- PC Close Button -->
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-teal-cyan focus:outline-none focus:ring-2 focus:ring-light-cyan cursor-pointer">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>

        <!-- Navigation Items -->
        @php
            $navItems = [
                [
                    'label' => 'Dashboard',
                    'icon' => 'ri-dashboard-fill',
                    'route' => 'mahasiswa.index',
                    'activeRoutes' => ['mahasiswa.index'],
                ],
                [
                    'label' => 'Submission',
                    'icon' => 'solar-letter-opened-bold',
                    'route' => 'mahasiswa.submission.index',
                    'activeRoutes' => ['mahasiswa.submission.index'],
                ],
                [
                    'label' => 'Letter',
                    'icon' => 'solar-letter-bold',
                    'route' => null,
                    'activeRoutes' => [
                        'mahasiswa.letter.skma',
                        'mahasiswa.letter.sptmk',
                        'mahasiswa.letter.skl',
                        'mahasiswa.letter.lhs',
                    ],
                    'children' => [
                        ['label' => 'SKMA', 'route' => 'mahasiswa.letter.skma'],
                        ['label' => 'SPTMK', 'route' => 'mahasiswa.letter.sptmk'],
                        ['label' => 'SKL', 'route' => 'mahasiswa.letter.skl'],
                        ['label' => 'LHS', 'route' => 'mahasiswa.letter.lhs'],
                    ],
                ],
            ];
        @endphp

        <ul class="space-y-2 font-medium">
            @foreach ($navItems as $item)
                @if (empty($item['children']))
                    <li>
                        <a href="{{ $item['route'] ? route($item['route']) : '#' }}"
                            class="flex items-center p-2 rounded-lg transition-colors duration-200 text-white cursor-pointer
                                  {{ in_array(request()->route()->getName(), $item['activeRoutes']) ? 'bg-teal-cyan' : 'hover:bg-teal-cyan' }}">
                            @if ($item['icon'] === 'ri-dashboard-fill')
                                <x-ri-dashboard-fill class="w-6 h-6 text-white" />
                            @elseif ($item['icon'] === 'solar-letter-opened-bold')
                                <x-solar-letter-opened-bold class="w-6 h-6 text-white" />
                            @elseif ($item['icon'] === 'solar-letter-bold')
                                <x-solar-letter-bold class="w-6 h-6 text-white" />
                            @endif
                            <span class="ms-3 text-md">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full rounded-lg transition-colors duration-200 text-white cursor-pointer
                                       {{ in_array(request()->route()->getName(), $item['activeRoutes']) ? 'bg-teal-cyan' : 'hover:bg-teal-cyan' }}"
                            aria-controls="dropdown-{{ Str::slug($item['label']) }}"
                            data-collapse-toggle="dropdown-{{ Str::slug($item['label']) }}">
                            @if ($item['icon'] === 'solar-letter-bold')
                                <x-solar-letter-bold class="w-6 h-6 text-white" />
                            @endif
                            <span class="flex-1 ml-3 text-left text-md whitespace-nowrap">{{ $item['label'] }}</span>
                            <svg aria-hidden="true"
                                class="w-6 h-6 text-white transition-transform duration-300 transform"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-chevron>
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-{{ Str::slug($item['label']) }}" class="hidden py-2 space-y-2"
                            data-collapsed-height="0" data-expanded-height="auto">
                            @foreach ($item['children'] as $child)
                                <li>
                                    <a href="{{ route($child['route']) }}"
                                        class="flex items-center p-2 pl-11 w-full rounded-lg transition-colors duration-200 text-white cursor-pointer
                                              {{ request()->routeIs($child['route']) ? 'bg-teal-cyan' : 'hover:bg-teal-cyan' }}">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Serialize PHP $navItems array to JavaScript
        const navItems = @json($navItems);

        // Handle dropdown toggle with chevron animation
        const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');
        dropdownButtons.forEach(button => {
            button.addEventListener('click', function() {
                const dropdownId = this.getAttribute('data-collapse-toggle');
                const dropdown = document.getElementById(dropdownId);
                const chevron = this.querySelector('[data-chevron]');

                // Toggle dropdown visibility and chevron rotation
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    chevron.classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    chevron.classList.remove('rotate-180');
                }
            });
        });

        // Set initial state based on active route
        const activeRoute = '{{ request()->route()->getName() }}';
        navItems.forEach(item => {
            if (item.children && item.activeRoutes.includes(activeRoute)) {
                const dropdownId = 'dropdown-' + item.label.toLowerCase().replace(/\s+/g, '-');
                const dropdown = document.getElementById(dropdownId);
                const button = document.querySelector(`[data-collapse-toggle="${dropdownId}"]`);
                const chevron = button ? button.querySelector('[data-chevron]') : null;

                if (dropdown) {
                    dropdown.classList.remove('hidden');
                }
                if (chevron) {
                    chevron.classList.add('rotate-180');
                }
            }
        });
    });
</script>
