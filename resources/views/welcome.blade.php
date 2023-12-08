<x-layout>
    
    @include('_blogs-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($blogs->isNotEmpty())

        <x-blog-grid :blogs="$blogs"/>

        @else
        <p class="text-center">No blogs yet.</p>
        @endif
    </main>

</x-layout>
