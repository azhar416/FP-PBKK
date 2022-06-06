<x-main-layout>
    <section class="flex flex-col p-5 space-y-2">
        <div class="px-1">
            <h1 class="font-bold text-3xl text-blue-900">{{ __('navbar.katalog') }}</h1>
        </div>
        <div class="flex p-1 space-x-2 items-center">
            <div class="space-y-1 px-1">
                <x-reuse.search action="/books">
                </x-reuse.search>
                
                <div class="grid grid-cols-3 grid-rows-3 gap-2 py-1">
                    @foreach ($books as $book)
                    <x-reuse.book-card :bookType="$book->book_type" :link='$book->slug' :image='$book->image'>
                        <x-slot name='title'>
                            {{ $book->name }}
                        </x-slot>
                        <x-slot name='category'>
                            {{ $book->book_type !== 'magazine' ? $book->category : 'null' }}
                        </x-slot>
                        <x-slot name='author'>
                            {{ $book->book_type !== 'magazine' ? $book->author : $book->publisher }}
                        </x-slot>
                        <x-slot name='timestamp'>
                            Added {{ $book->created_at->diffForHumans() }}
                        </x-slot>
                    </x-reuse.book-card>
                    @endforeach
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </section>
</x-main-layout>