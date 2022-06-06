<x-main-layout>
    <section>
        <div class=" relative grid grid-cols-1 lg:grid-cols-2 bg-blue-900 h-full">
            <div class="relative flex items-center  lg:pl-4 h-full">
                <div class="relative py-24 px-8">
                    <h2 class="text-2xl font-bold text-white sm:text-3xl">{{__('welcome.welcome')}}</h2>

                    <p class="mt-4 text-white w-2/4">
                    {{ __('welcome.about') }}
                    </p>

                    <x-reuse.search action="/books"></x-reuse.search>
                </div>
                
                <span class="absolute -inset-y-0 hidden w-16 bg-blue-900 lg:block -right-16"></span>
            </div>

            <div class="relative z-10 lg:py-0 lg:px-6">
                <div class="relative h-64 lg:h-full ">
                    <img class="justify-center relative inset-0  lg:scale-100" src="{{ asset('storage/staticImages/dashboard-image.png') }}"
                        alt="" />
                        
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex justify-between items-center p-2 space-x-">
            <div class="p-2 flex-1">
                <x-reuse.top-border-card logo="monta.png" href='http://monta.if.its.ac.id'>
                    {{ __('welcome.tugas_akhir') }}
                </x-reuse.top-border-card.top-border-card>
            </div>
            <div class="p-2 flex-1">
                <x-reuse.top-border-card logo="book.png" href='/books'>
                    {{ __('welcome.buku') }}
                </x-reuse.top-border-card.top-border-card>
            </div>
            <div class="p-2 flex-1">
                <x-reuse.top-border-card logo="magz.png" href='/books'>
                    {{ __('welcome.majalah') }}
                </x-reuse.top-border-card.top-border-card>
            </div>
            <div class="p-2 flex-1">
                <x-reuse.top-border-card logo="paper.png" href='/books'>
                    {{ __('welcome.research_paper') }}
                </x-reuse.top-border-card.top-border-card>
            </div>
        </div>
    </section>
</x-main-layout>
