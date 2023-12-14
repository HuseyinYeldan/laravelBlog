<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 lg:mt-0 space-y-6">
            <h2 class="text-center font-bold" style="font-size: 32pt">Edit a Blog</h2>
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <form action="/admin/blog" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name='title' labelText='Title' value='{{ $blog->title }}' />
                    <x-form.input name='excerpt' labelText='Excerpt' value='{{ $blog->excerpt }}'/>
                    <x-form.input name='image' labelText='Image' type='file' />
                    <x-form.input name='slug' labelText='Slug' value='{{ $blog->slug }}'/>
                    <x-form.select name='category_id' labelText='Category' value='{{ $blog->category_id }}'/>
                    <x-form.textarea name='body' labelText='Content'> {{ $blog->body }} </x-form.textarea>
                    <x-form.submit buttonText='SUBMIT' />
                </form>
            </div>
        </main>
    </section>
</x-layout>