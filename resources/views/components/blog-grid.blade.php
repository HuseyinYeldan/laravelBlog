@props(['blogs'])
<x-blog-featured-card :blogs="$blogs[0]"/>

@if($blogs->count() > 1)
<div class="lg:grid lg:grid-cols-6">
    @foreach ($blogs->skip(1) as $blog)
        <x-blog-card :blogs="$blog" class="{{ $loop->index >=2?'col-span-2':'col-span-3' }}" />
    @endforeach
</div>

@endif