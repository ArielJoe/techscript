<div id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-[#093A3E] sm:translate-x-0"
    aria-label="Sidebar">
    <ul class="space-y-2 font-medium px-2 text-white">
        <li>
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 my-2 text-sm text-white rounded-lg sm:hidden hover:bg-gray-100 hover:text-black focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red">
                <x-ri-dashboard-fill class="w-8 h-8" />
                <span class="ms-3 text-lg">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg">
                <x-solar-letter-opened-bold class="w-8 h-8" />
                <span class="ms-3 text-lg">Submissions</span>
            </a>
        </li>
    </ul>
</div>
