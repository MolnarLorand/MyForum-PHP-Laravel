@props(['comment'])
<article class="flex border border-blue-200 bg-blue-100 p-6 rounded-xl space-x-4">
    {{--Avatar--}}
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="Avatar-picture" width="60" height="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="=bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a')}}</time> </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
