<x-layout>
    <x-setting :headding="'Edit post ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title',$post->title)"/>
            <x-form.input name="slug" :value="old('slug',$post->slug)"/>
            <div>
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl" width="100">
            </div>
            <div class="mb-2 mt-4">
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="bg-white border border-blue-400 focus:outline-none focus:ring rounded-xl py-2 px-2">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>

                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </div>

            <x-form.textarea name="fragment">{{ old('fragment', $post->fragment) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <div class="bg-blue-300 hover:bg-blue-500 ml-28 mr-28 mt-2 py-2 rounded-xl text-center">
                <button type="submit"
                        class="font-bold"
                >
                    Update
                </button>
            </div>
        </form>
    </x-setting>
</x-layout>
