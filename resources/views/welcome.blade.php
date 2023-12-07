<x-layout>
    @foreach ($blogs as $blog)
        <article class="content">
            <h1 class="title">{{ $blog->title }}</h1>
            <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
            <p>{{ $blog->excerpt }}</p>
            <a href="/blog/{{ $blog->slug }}">Read More</a>
        </article>
    @endforeach
</x-layout>
