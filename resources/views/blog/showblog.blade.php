<x-app-layout>
    {{-- @include('') --}}
    <div class="w-full min-h-screen flex justify-center items-start m-auto bg-blue-200 dark:bg-slate-950" style="">
        <div class="w-11/12 lg:w-4/5 sm:w-11/12 mt-24 p-2 my-10 bg-blue-100 dark:bg-slate-900 rounded-lg shadow-lg">
            <div class="flex justify-start">
                <h1 class="text-2xl mt-3 m-2 text-indigo-500 font-semibold">{!! nl2br($blog->blogtitle) !!}</h1>
            </div>
            <div class="flex justify-start">
                <p class="text-md m-2 dark:text-slate-100">{!! nl2br($blog->blogcontent) !!}</p>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
