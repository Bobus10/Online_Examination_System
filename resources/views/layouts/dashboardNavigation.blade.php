<div>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

        {{-- Navigation sidebar --}}
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
            <x-dashboard.nav-header>Admin Panel</x-dashboard.nav-header>

            {{-- Nav links --}}
            <nav class="mt-10">
                <x-dashboard.nav-link route='admin.index'>Dashboard</x-dashboard.nav-link>
                <x-dashboard.nav-link route='fos.index'>Field of study</x-dashboard.nav-link>
            </nav>
        </div>

        <div class="flex flex-col flex-1 overflow-hidden">
            {{-- Header --}}
            <div>
                <x-dashboard.header/>
            </div>
            {{-- Content --}}
            <div class='overflow-auto'>
                {{ $slot }}
            </div>

        </div>
    </div>
</div>
