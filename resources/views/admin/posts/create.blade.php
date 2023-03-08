<x-layout>
    <x-setting headding="Add new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>

            <div class="mb-2 mt-4">
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="bg-white border border-blue-400 focus:outline-none focus:ring rounded-xl py-2 px-2">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : ''}}>

                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </div>

            <x-form.textarea name="fragment"/>
            <x-form.textarea name="body"/>

            <div class="bg-blue-300 hover:bg-blue-500 ml-28 mr-28 mt-2 py-2 rounded-xl text-center">
                <button type="submit"
                        class="font-bold"
                >
                    Submit
                </button>
            </div>
        </form>
    </x-setting>
</x-layout>
