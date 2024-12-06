{{-- <x-app-layout>
    <div class="min-h-screen flex bg-sky-50 dark:bg-slate-800 justify-center items-start shadow-lg rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-24 w-4/5">
            <!-- Blog Card -->
            <div class="w-full max-h-72 min-h-72 flex justify-center rounded-lg shadow-xl p-4">
                Lokesh
            </div>
            <!-- Blog Card -->
            <div class="w-full max-h-72 min-h-72 flex justify-center rounded-lg shadow-xl p-4">
                Lokesh
            </div>
            <!-- Blog Card -->
            <div class="w-full max-h-72 min-h-72 flex justify-center rounded-lg shadow-xl p-4">
                Lokesh
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <div class="min-h-screen bg-blue-200 dark:bg-slate-950 flex justify-center items-start shadow-lg rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-24 w-11/12 lg:w-4/5 sm:w-11/12">
            @foreach ($blogs as $blog)
                <div
                    class="w-full min-h-80 flex flex-col justify-center rounded-lg shadow-xl p-4 bg-blue-100 dark:bg-slate-900">
                    <div class="flex flex-col justify-between h-full w-full">
                        <!-- Blog Title -->
                        <div>
                            <h3 class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                                {{ $blog->blogtitle }}
                            </h3>
                        </div>

                        <!-- Blog Content -->
                        <div class="-mt-16">
                            <p class="text-gray-700 dark:text-slate-300 text-sm truncate">
                                {{ Str::limit($blog->blogcontent, 150) }}
                            </p>
                        </div>

                        <!-- Action Links -->
                        <div class="flex flex-row justify-between">
                            <a href="{{ route('bloguser.show', $blog->author_id) }}"
                                class="text-indigo-500 dark:text-indigo-400 text-sm mt-4">
                                Profile
                            </a>
                            <a href="{{ route('blog.show', $blog->id) }}"
                                class="text-indigo-500 dark:text-indigo-400 text-sm mt-4">
                                Read More..
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

{{-- <div class=""></div> --}}


{{-- <div class="col-span-8 w-full min-w-full">
    @if ($blogs->count())
        @foreach ($blogs as $blog)
            <div class="border-2 border-indigo-600 m-4 p-4 rounded-lg shadow-lg">
                <div class="flex justify-center">
                    <p style="">{!! nl2br(e($blog->blogcontent)) !!}</p><br>
                </div>
                <div class="flex justify-start">
                    <p class="text-indigo-900 font-bold bg-indigo-200 mt-2 p-2 rounded-lg">
                        {{-- {{ $blog->user->name }} </p> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- @endforeach
    @else --}}
{{-- <p class="m-4 p-4 bg-slate-100 text-center shadow-lg rounded-lg text-red-700"> 😞 No blogs found.
        </p> --}}
{{-- @endif --}}
{{-- </div> --}}
