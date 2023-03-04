<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-center">No post created yet. Check later</p>
        @endif
    </main>

    {{--    @foreach ($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        --}}{{--            <?= $post->title; ?>  Same thing --}}{{--
                        {!! $post->title !!}
                    </a>
                </h1>

                <p>
                    Created by <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> category
                </p>

                <div>{!!  $post->fragment !!}</div>
            </article>
        @endforeach--}}
</x-layout>
