<x-layout>
    
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($blogs->isNotEmpty())

        <x-blog-grid :blogs="$blogs"/>
        {{ $blogs->links() }}
        @else
        <p class="text-center">No blogs yet.</p>
        @endif
    </main>

</x-layout>
