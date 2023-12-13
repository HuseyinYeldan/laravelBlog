<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 lg:mt-0 space-y-6">
            <h2 class="text-center font-bold" style="font-size: 32pt">Add a Blog</h2>
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <form action="/admin/blog" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name='title' labelText='Title' />
                    <x-form.input name='excerpt' labelText='Excerpt' />
                    <x-form.input name='image' labelText='Image' type='file' />
                    <x-form.input name='slug' labelText='Slug' />
                    <x-form.select name='category_id' labelText='Category' />
                    <x-form.textarea name='body' labelText='Content' />
                    <x-form.submit buttonText='SUBMIT' />
                </form>
            </div>
        </main>
    </section>
</x-layout>