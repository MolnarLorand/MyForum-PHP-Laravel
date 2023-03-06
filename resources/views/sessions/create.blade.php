<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-blue-200 border border-blue-400 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <x-form.input name="email" type="email" autocomplete="username">
                    <x-form.error name="email" autocomplete="new-password"/>
                </x-form.input>

                <x-form.input name="password" type="password">
                    <x-form.error name="password"></x-form.error>
                </x-form.input>


                <div class="text-center mb-6 bg-blue-400 text-white rounded-xl py-2 px-4 hover:bg-blue-600 mt-6 ml-28 mr-28">
                    <button type="submit"
                            class="font-bold"
                    >
                        Log In
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
