@props(['comment'])
<article class="flex py-6">
    <div class="mr-2 flex-shrink-0"><img src="https://i.pravatar.cc/50?u={{ $comment->user->id }}" class="rounded-full" alt=""></div>
    <div class="relative w-full">
        <header>
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time> @if($comment->created_at != $comment->updated_at) - <i class="text-gray-400">(Edited {{ $comment->updated_at->diffForHumans() }})</i> @endif </p>
        </header>
        <p class="mt-2 break-all">{{ $comment->body }}</p>

        @if(Auth::check() && Auth::user()->id === $comment->user->id)
        <form action="/comment/{{ $comment->id }}/comment-delete" method="post" class="absolute right-0 top-0">
            @csrf
            <button type="submit" class="px-3 py-1 mt-2 rounded-full bg-red-400 ring-2 ring-red-200 text-xs font-semibold text-white"><i class="fa-solid fa-trash"></i> </button>
        </form>
        <form action="/comment/{{ $comment->id }}/comment-update" method="post" x-data="{ isVisible: false }">
            @csrf
            <button type="button"  @click="isVisible = !isVisible" class="px-3 py-1 mt-2 rounded-full bg-blue-400 ring-2 ring-blue-200 text-xs font-semibold text-white absolute right-12 top-0"><i class="fa-solid fa-pen-to-square"></i></button>
            <div x-show="isVisible">
                <button type="submit"  class="px-3 py-1 mt-2 rounded bg-blue-400 ring-2 ring-blue-200 text-xs font-semibold text-white absolute right-2 bottom-4">Save</button>
                <textarea xshow="isVisible" name="newComment" id="newComment" required minlength="4" maxlength="256" class="w-full border-2 mt-2 p-2 rounded border-black-500 @error('newComment')is-invalid @enderror" cols="30" rows="5" placeholder="Edit your comment...">{{ $comment->body }}</textarea>
            </div>
        </form>
        @error('newComment')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
        @endif


    </div>
</article>
<hr>
