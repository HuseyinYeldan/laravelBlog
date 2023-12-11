@props(['comment'])
<article class="flex py-6">
    <div class="mr-2 flex-shrink-0"><img src="https://i.pravatar.cc/50?u={{ $comment->user->id }}" class="rounded-full" alt=""></div>
    <div>
        <header>
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time> </p>
        </header>
        <p class="mt-2 break-all">{{ $comment->body }}</p>
    </div>
</article>
<hr>
