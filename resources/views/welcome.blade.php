<x-layout>
    @foreach ($blogs as $blog)
        <article class="content">
            <h1 class="title">{{ $blog->title }}</h1>
            <small>Written by <a href="/user/{{ $blog->user->username }}">{{ $blog->user->name }}</a> to <a href="/categories/{{ $blog->category->slug }}">Category: {{ $blog->category->name }}</a></small>
            <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
            <p>{{ $blog->excerpt }}</p>
            <a href="/blog/{{ $blog->slug }}">Read More</a>
        </article>
    @endforeach
    <a href="/blogs">Home Page</a>
</x-layout>
