<x-main-layout>
    <section>
        <div class=" relative grid grid-cols-1 lg:grid-cols-2 bg-blue-900 h-full">
            <div class="relative flex items-center  lg:pl-4 h-full">
                <div class="relative py-24 px-8">
                    <h2 class="text-2xl font-bold text-white sm:text-3xl">Welcome to Ruang Baca TC</h2>

                    <p class="mt-4 text-white w-2/4">
                        Sistem Informasi Ruang Baca TC merupakan sistem informasi berbasis online milik RBTC agar
                        memudahkan dosen
                        dan mahasiswa untuk mengakses sumber belajar digital yang disediakan oleh Teknik Informatika ITS
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
                {{-- <x-partial.cards.top-border-card logo="monta.png" href='http://monta.if.its.ac.id'>
          </x-partial.cards.top-border-card> --}}
                Tugas Akhir
            </div>
            <div class="p-2 flex-1">
                {{-- <x-partial.cards.top-border-card logo="book.png" href='/books'>
          </x-partial.cards.top-border-card> --}}
                Buku
            </div>
            <div class="p-2 flex-1">
                {{-- <x-partial.cards.top-border-card logo="magz.png" href='/books'>
          </x-partial.cards.top-border-card> --}}
                Majalah
            </div>
            <div class="p-2 flex-1">
                {{-- <x-partial.cards.top-border-card logo="paper.png" href='/books'>
          </x-partial.cards.top-border-card> --}}
                Research Paper
            </div>
        </div>
    </section>
</x-main-layout>
