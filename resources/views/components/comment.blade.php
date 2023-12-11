@props(['comment'])
<article class="flex py-6">
    <div class="mr-2 flex-shrink-0"><img src="https://i.pravatar.cc/50?u={{ $comment->user->id }}" class="rounded-full" alt=""></div>
    <div>
        <header>
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time> </p>
        </header>
        <p class="mt-2 break-all">{{ $comment->body }}</p>

        @if(Auth::check() && Auth::user()->id === $comment->user->id)
        <form action="/comment/{{ $comment->id }}/comment-delete" method="post">
            @csrf
            <button type="submit" class="px-3 py-1 mt-2 rounded bg-red-400 ring-2 ring-red-200 text-xs font-semibold text-white">Delete Comment</button>
        </form>
        @endif


    </div>
</article>
<hr>
