@props(['name','labelText'])
<x-form.panel>
    <label for="{{ $name }}" class="text-xl mb-2"> <b>{{ $labelText }}</b> </label>
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" placeholder="{{ $labelText }}..." class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none @error($name)is-invalid @enderror"></textarea>
    <x-form.error name='{{ $name }}' />
</x-form.panel>