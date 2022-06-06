<x-main-layout>
    <section class="flex flex-col p-5 space-y-2">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex-1 flex-col justify-between">
                            <div class="flex flex-col justify-between h-3/4">
                                <div>
                                    <p class="text-3xl font-bold text-blue-600">{{ __('navbar.profile') }}</p>
                                </div>
                                <div class="text-base">
                                    <table class="table-auto">
                                        <tbody>
                                            <tr>
                                                <td class="mt-3 text-blue-600 font-bold">{{ __('register.name') }} </td>
                                                <td>: {{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="mt-3 text-blue-600 font-bold">{{ __('register.email') }} </td>
                                                <td>: {{ $user->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="flex flex-col justify-end h-1/4" style="width: 8vw; margin-top: 10px;">
                                <a href="/"
                                    class="block bg-blue-600 p-2 rounded-md text-white text-center drop-shadow-md">{{ __('navbar.home') }}</a>
                            </div>
                        </div>
                    </div>
                    {{-- Not --}}
                </div>
                {{-- Heck yea --}}
            </div>
            {{-- last bru --}}
        </div>
    </section>
</x-main-layout>