@props(['name', 'type'=>'text'])
<div class="mb-2">
    <x-form.label name="{{ $name }}"/>
    <input class="border border-blue-400 p-2 w-full focus:outline-none focus:ring rounded-xl"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old( $name) }}"
           required
           {{ $attributes }}
    >

    <x-form.error name="{{ $name }}"/>
</div>
