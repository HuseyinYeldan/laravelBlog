<x-layout>
    {{-- Route'dan gelen bilgiyi blade ile göster --}}
    <article class="content">
        <h1 class="title">{{ $blog->title }}</h1>
        <small>Written by <a href="#">{{ $blog->user->name }}</a> to <a href="/categories/{{ $blog->category->slug }}">Category: {{ $blog->category->name }}</a></small>
        <img src="{{ $blog->image }}" class="blog-image" alt="{{ $blog->title }}">
        <p>{!! $blog->body !!}</p>
        <a href="/blogs">Go Back</a>
    </article>
</x-layout>