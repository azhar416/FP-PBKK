<x-main-layout>
    <div class="flex p-2">
        <x-reuse.back-button :href="url()->previous()" class="mx-3 my-2" />
    </div>
    <div class="relative flex flex-col items-center">
        <div class="flex space-x-3 px-1 py-2 w-3/4 justify-between items-center">
           <h1 class="text-3xl font-bold text-blue-600"> {{ $book->name }} </h1>
        </div>

        <div class="relative flex space-x-3 px-1 py-2 justify-between items-center mb-5">
            <iframe src="{{ asset('uploads/' . $book->link) }}" class="aspect-video" style="width: 1200px; height: 950px">Your browser isn't compatible</iframe>
        </div>
    </div>
</x-main-layout>
