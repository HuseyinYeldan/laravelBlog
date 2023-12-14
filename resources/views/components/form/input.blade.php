@props(['name','labelText', 'type'=>'text'])
<x-form.panel>
    <label for="{{ $name }}" class="text-xl mb-2"> <b>{{ $labelText }}</b> </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" 
        class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none @error($name)is-invalid @enderror"
        placeholder="{{ $labelText }}..." {{ $attributes }}>
    <x-form.error name='{{ $name }}' />
</x-form.panel>