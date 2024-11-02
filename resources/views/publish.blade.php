<x-app-layout>
    <div class="w-full bg-sky-50 dark:bg-gray-800 flex items-center justify-center min-h-screen">
        <div class="w-1/2 bg-slate-50 dark:bg-gray-700  shadow-lg rounded-lg p-8 -mt-28">
            <h1 class="text-xl font-bold text-slate-800 dark:text-slate-50 mb-6 text-center">Create a Post</h1>

            <form action="{{ route('publish.store') }}" method="POST" class="space-y-6">
                <!-- Title Field -->
                @csrf
                <div class="mx-auto pl-12">
                    <label for="title"
                        class="block text-sm font-medium text-gray-600 dark:text-slate-50 mb-1">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter title" required
                        class="w-11/12 px-4 py-2 border text-gray-600 dark:text-slate-50 border-gray-300 rounded-md focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:bg-gray-900" />
                </div>

                <!-- Content Field -->
                <div class="mx-auto pl-12">
                    <label for="content"
                        class="block text-sm font-medium text-gray-600 dark:text-slate-50 mb-1">Content</label>
                    <textarea id="content" name="content" rows="5" placeholder="Write your content here..." required
                        class="w-11/12 px-4 py-2 border text-gray-600 dark:text-slate-50  border-gray-300 dark:bg-gray-900 rounded-md focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 resize-none"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="w-1/2 bg-indigo-600 hover:bg-indigo-400 hover:text-neutral-100 text-neutral-100 font-semibold py-2 px-4 rounded-md transition duration-200">
                        Submit
                    </button>
                </div>
                @if (session('success'))
                    <div class="ml-44 text-green-900 bg-green-100 flex items-center justify-center h-10 text-center dark:bg-slate-400 py-2 px-4 rounded-lg  w-1/2"
                        id="message">
                        {{ session('success') }}
                    </div>
                @endif
            </form>

        </div>
    </div>
</x-app-layout>

{{-- <div class="pico grid">
        <div></div>
        <div>
            <article style="margin-top: 100px;box-shadow: none;">
                <form class="" action="{{ route('publish.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Title">
                    <textarea name="content" placeholder="Description" rows="10"></textarea>
                    <button type="submit">Publish</button>
                </form>
                <!-- Display the success message -->
                @if (session('success'))
                    <div class="green" id="message">
                        {{ session('success') }}
                    </div>
                @endif
            </article>
        </div>
        <div></div>
    </div> --}}
