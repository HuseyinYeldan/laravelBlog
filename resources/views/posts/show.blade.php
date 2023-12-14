<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ $blog->image == 'https://picsum.photos/800/800' ? $blog->image: '/storage/'.$blog->image }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $blog->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <a href="/?user={{ $blog->user->username }}">
                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        </a>
                        <a href="/?user={{ $blog->user->username }}">
                            <div class="ml-3 text-left">
                                <h5 class="font-bold">{{ $blog->user->name }}</h5>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>


                        <div class="space-x-2">
                            <x-category-button :category="$blog->category"/>
                        </div>
                    </div>

                    @if(Auth::check() && Auth::user()->id == $blog->user->id)
                        <a href="/admin/blog/{{ $blog->id }}/edit" class="px-3 py-1 rounded bg-yellow-400 ring-2 ring-yellow-300 text-sm font-semibold text-white">Edit <i class="fa-solid fa-pen ml-1"></i></a>
                    @endif
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10 mt-2">
                        {{ $blog->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose mb-20 break-all">
                        <p>{{ $blog->body }}</p>
                    </div>
                    @if(Auth::check())
                    <hr>
                    <section id="commentAdd" class="mt-4">
                        <p>You are commenting as <strong>{{ Auth::user()->name }}</strong> 
                            <form action="/logout" method="POST">@csrf <button type="submit" class="text-sm text-blue-400 font-semibold">Logout</button></form> 
                        </p>
                        
                        <form action="/blog/{{ $blog->slug }}/comment" method="post"  class="mt-4">  
                        @csrf
                            <label for="" class="font-bold">Comment:</label>
                            <textarea name="comment" id="comment" required minlength="4" maxlength="256" class="w-full border-2 mt-2 p-2 rounded border-black-500 @error('comment')is-invalid @enderror" cols="30" rows="5" placeholder="Comment...">{{ old('comment') }}</textarea>
                            @error('comment')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="px-5 py-2 bg-blue-400 text-white font-bold rounded-full text-sm duration-300 hover:bg-blue-500">Comment</button>
                        </form>

                    </section>
                    @else
                    <section id="commentAdd" class="mt-4">
                        <p class="text-center text-xl">Please <a href="/login" class="font-bold underline">log in</a> or <a href="/register" class="font-bold underline">register</a> to comment.</p>
                    </section>
                    @endif

                    <section id="comments" class="mt-10">
                        <h3 class="font-bold mb-2 text-xl">Comments ({{ count($blog->comment) }}) </h3>
                        <hr>
                        @if(!isset($blog->comment[0]))
                            <h3 class="mt-4 font-bold text-xl">No comments yet.</h3>
                        @endif

                        @foreach ($blog->comment->sortByDesc('created_at') as $comment)
                            <x-comment :comment="$comment" />
                        @endforeach
                    </section>
                </div>



            </article>
        </main>


    </section>
</x-layout>
