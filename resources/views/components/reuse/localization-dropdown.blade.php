<div class="flex items-center justify-end">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm space-x-2 font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                {{-- <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : 'https://source.unsplash.com/500x400?people' }}" alt="" class="rounded-full h-6 w-6"> --}}
                <div>{{ str_replace('_', '-', app()->getLocale()) }}</div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link href="/set/en/">
                en
            </x-dropdown-link>
            <x-dropdown-link href="/set/id">
                id
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>