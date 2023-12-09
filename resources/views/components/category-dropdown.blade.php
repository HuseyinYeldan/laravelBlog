<x-dropdown>
    <x-slot name="trigger">
        <button
            class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 w-32 text-sm font-semibold">{{ isset($currentCat->name) ? ucwords($currentCat->name) : 'Categories' }}
        </button>
    </x-slot>

    <x-dropdown-item href="/">All</x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}" :active="isset($currentCat->name) && $currentCat->name == $category->name">  
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>