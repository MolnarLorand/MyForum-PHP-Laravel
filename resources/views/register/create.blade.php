<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-blue-200 border border-blue-400 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-form.input name="name">
                    <x-form.error name="name"/>
                </x-form.input>

                <x-form.input name="username">
                    <x-form.error name="username"/>
                </x-form.input>

                <x-form.input name="email" type="email">
                    <x-form.error name="email"/>
                </x-form.input>

                <x-form.input name="password" type="password">
                    <x-form.error name="password"/>
                </x-form.input>

                <div class="text-center mb-6 bg-blue-400 text-white rounded-xl py-2 px-4 hover:bg-blue-600 mt-6 ml-28 mr-28">
                    <button type="submit"
                            class="font-bold"
                    >
                        Submit
                    </button>
                </div>
                {{-- Show all errors on the bottom of the form--}}
{{--                @if( $errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
--}}
            </form>
        </main>
    </section>
</x-layout>
