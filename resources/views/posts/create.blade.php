<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 lg:mt-0 space-y-6">
            <h2 class="text-center font-bold" style="font-size: 32pt">Add a Blog</h2>
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <form action="/admin/blog" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col my-6">
                        <label for="title" class="text-xl mb-2"> <b>Title</b> </label>
                        <input type="text" name="title" id="title" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none" placeholder="Title...">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <label for="excerpt" class="text-xl mb-2"> <b>Excerpt</b> </label>
                        <input type="text" name="excerpt" id="excerpt" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none" placeholder="Excerpt...">
                        @error('excerpt')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <label for="thumbnail" class="text-xl mb-2"> <b>Thumbnail</b> </label>
                        <input type="file" name="image" id="thumbnail" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none" placeholder="Image...">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <label for="slug" class="text-xl mb-2"> <b>Slug</b> </label>
                        <input type="text" name="slug" id="slug" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none" placeholder="my-cool-slug">
                        @error('slug')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <label for="category_id" class="text-xl mb-2"> <b>Category</b> </label>
                        <select name="category_id" id="category_id" class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none" required>
                            <option selected disabled hidden value="0">Please Select A Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <label for="body" class="text-xl mb-2"> <b>Content</b> </label>
                        <textarea name="body" id="body" cols="30" rows="10" placeholder="Content..." class="border border-gray-300 p-2 rounded duration-300 focus:border-blue-300 outline-none"></textarea>
                        @error('body')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="flex flex-col my-6">
                        <button type="submit" class="border border-gray-300 bg-blue-400 ring-2 ring-blue-200 text-white font-bold text-xl p-2 rounded duration-300 focus:border-blue-300 outline-none">SUBMIT</button>
                    </div>
                </form>
            </div>
        </main>
    </section>
</x-layout>