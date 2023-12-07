<x-layout>
    {{-- Route'dan gelen bilgiyi php ile göster --}}
    <article class="content">
        <h1 class="title">{{ $blog->title }}</h1>
        <a href="/categories/{{ $blog->category->slug }}"><small>Category: {{ $blog->category->name }}</small></a>
        <img src="{{ $blog->image }}" class="blog-image" alt="{{ $blog->title }}">
        <p>{!! $blog->body !!}</p>
        <a href="/blogs">Go Back</a>
    </article>
</x-layout>