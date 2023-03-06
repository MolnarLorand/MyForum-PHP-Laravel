@props(['headding'])
<section class="px-6 py-8">
    <div class="border border-gray-200 max-w-4xl max-w-sm mx-auto p-6 rounded-xl">
        <h1 class="text-center mb-6 font-bold">
            {{ $headding }}
        </h1>

        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-6">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-400' : ''}}">New Post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel>
                    {{ $slot }}
                </x-panel>
            </main>
        </div>
    </div>
</section>
