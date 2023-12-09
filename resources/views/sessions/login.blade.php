<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-6">

                    <label class="block mb-2 mt-4 uppercase font-bold text-xs text-gray-700"
                        for="email">Email</label>

                    <input class="border border-gray-400 p-2 w-full rounded @error('email') is-invalid @enderror" type="text"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror


                    <label class="block mb-2 mt-4 uppercase font-bold text-xs text-gray-700"
                        for="password">Password</label>

                    <input class="border border-gray-400 p-2 w-full rounded @error('password') is-invalid @enderror"
                        type="password" name="password" id="password" required>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="bg-blue-400 w-full text-white rounded py-2 px-4 hover:bg-blue-500">
                            Log In
                        </button>
                    </div>

            </form>

        </main>
    </section>
</x-layout>
