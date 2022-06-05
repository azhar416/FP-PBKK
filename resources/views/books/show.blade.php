<x-main-layout>
    <section class="p-2">
        <div class="flex p-2">
            <x-reuse.back-button :href="url()->previous()" class="mx-3 my-2" />
        </div>
        <x-reuse.card class="w-full p-4">
            <div class="flex space-x-5">
                <div>
                    <img src="{{ $book->image ? asset('uploads/' . $book->image) : 'https://source.unsplash.com/500x400' }}"
                        class="max-w-md">
                </div>
                <div class="flex-1 flex-col justify-between">
                    <div class="flex flex-col justify-between h-3/4">
                        <div>
                            <p class="text-3xl font-bold text-blue-600">{{ $book->name }}</p>
                            <p class="text-xl font-light">{{ $book->author }}</p>
                            @if ($book->book_type !== 'magazine')
                                <x-reuse.badge class="">{{ $book->category }}</x-reuse.badge>
                            @endif
                        </div>
                        <div class="text-base">
                            <table class="table-auto">
                                <tbody>
                                    <tr>
                                        <td>Type </td>
                                        <td>: {{ ucfirst($book->book_type) }}</td>
                                    </tr>
                                    @if (isset($book->paper->doi))
                                        <tr>
                                            <td>DOI </td>
                                            <td>: {{ $book->paper->doi }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Publisher </td>
                                        <td>: {{ $book->publisher }}</td>
                                    </tr>
                                    <tr>
                                        <td>Year Published </td>
                                        <td>: {{ $book->year_published }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="mt-3 text-blue-600 font-bold">Description</p>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-end h-1/4 ">
                        <a href="/books/{{ $book->slug }}/read"
                            class="block bg-blue-600 p-2 rounded-md text-white text-center drop-shadow-md">Read</a>
                    </div>
                </div>
            </div>
        </x-reuse.card>
    </section>
</x-main-layout>
