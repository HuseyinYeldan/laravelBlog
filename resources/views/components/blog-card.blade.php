@props(['blogs'])
<article {{ $attributes->merge(['transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
<div class="py-6 px-5">
    <div>
        <img src="{{ $blogs->image == 'https://picsum.photos/seed/picsum/800/800' ? $blogs->image: '/storage/'.$blogs->image }}" alt="Blog Post illustration" class="rounded-xl">
    </div>

    <div class="mt-8 flex flex-col justify-between">
        <header>
            <div class="space-x-2">
                <x-category-button :category="$blogs->category"/>
            </div>

            <div class="mt-4">
                <h1 class="text-3xl">
                    <a href="/blog/{{ $blogs->slug }}"> {{ $blogs->title }}</a>
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                    Published <time>{{ $blogs->created_at->diffForHumans() }}</time>
                </span>
            </div>
        </header>

        <div class="text-sm mt-4">
            <p>
                {{ $blogs->excerpt }}
            </p>

        </div>

        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3">
                    <a href="/?user={{ $blogs->user->username }}"><h5 class="font-bold">{{ $blogs->user->name }}</h5></a>
                    <h6>Mascot at Laracasts</h6>
                </div>
            </div>

            <div>
                <a href="/blog/{{ $blogs->slug }}"
                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                >Read More</a>
            </div>
        </footer>
    </div>
</div>
</article>