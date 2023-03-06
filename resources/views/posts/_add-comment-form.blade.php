@auth()
    <form method="POST" action="/posts/{{$post->slug}}/comments"
          class="border border-blue-200 bg-gray-100 p-6 rounded-xl mt-4">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="Avatar-picture" width="40" height="40"
                 class="rounded-xl">
            <h2 class="ml-4"> Add a comment! </h2>
        </header>

        <div class="mt-4">
                        <textarea name="body"
                                  cols="30" rows="7" placeholder="Add a comment!"
                                  class="w-full focus:outline-none focus:ring border border-blue-200 text-sm"
                                  required></textarea>

            <x-form.error name="body"/>

        </div>
        <div class="mt-2 flex justify-end">
            <button type="submit" class="bg-blue-400 text-white rounded-xl hover:bg-blue-600 py-2 px-10">Post</button>
        </div>
    </form>
@else
    <br><br>
    <p>
        <a href="/login" class="hover:underline bg-blue-400 text-white rounded-xl py-2 px-4">
            Log In to leave a comment!
        </a>
        <a href="/register" class="hover:underline bg-blue-400 text-white rounded-xl py-2 px-4 ml-20">
            Register to leave a comment!
        </a>
    </p>
@endauth
