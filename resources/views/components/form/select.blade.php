@props(['name','labelText','categories'])
<x-form.panel>
    <label for="{{ $name }}" class="text-xl mb-2"> <b>{{ $labelText }}</b> </label>
    <select name="{{ $name }}" id="{{ $name }}" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none @error($name)is-invalid @enderror" required>
        <option selected disabled hidden value="0">{{ $labelText }}</option>
        @foreach (App\Models\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <x-form.error name='{{ $name }}' />
</x-form.panel>
