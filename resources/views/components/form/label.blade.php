@props(['name'])

<label class="block mb-2 uppercase font-bold text-sm "
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>
