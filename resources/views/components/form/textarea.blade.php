@props(['name'])
<div class="mb-2 mt-4">
    <x-form.label name="{{ $name }}"/>
    <textarea class="border border-blue-400 p-2 w-full focus:outline-none focus:ring rounded-xl"
              name="{{ $name }}"
              id="{{ $name }}"
              required
    >{{ $slot ?? old($name) }}
                    </textarea>

    <x-form.error name="{{ $name }}"/>

</div>
