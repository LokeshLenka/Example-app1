<x-app-layout>
    <div class="min-h-screen flex bg-blue-200 dark:bg-slate-950 justify-center items-start shadow-lg rounded-lg ">
        @if (session('publish'))
            <div class="fixed z-20 mt-36 text-green-500 bg-sky-100 dark:bg-gray-700 font-extrabold flex justify-center items-center h-12 text-center py-2 px-4 rounded-lg w-1/4"
                id="published">
                {{ session('publish') }}
            </div>
        @endif
        <div class="w-11/12 lg:w-4/5 sm:w-11/12 dark:bg-slate-950 p-auto m-auto mt-24 rounded-lg">
            <form action="{{ route('blog.store') }}" method="POST" class="">
                @csrf
                {{-- <div class="flex justify-center">
                    <div class="w-11/12 z-10 mb-4 p-2 mt-2 h-12 fixed rounded-lg backdrop-blur-sm bg-white/30 dark:bg-white/10 bg-opacity-50"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                        <h2 class="text-center p-1">Tools to style the blog </h2></div>
                </div> --}}
                <div class="flex justify-center">
                    <textarea
                        class="w-full resize-none bg-inherit border-l-indigo-500 border-l-4  border-r-0 border-t-0 border-b-0 focus:outline:none focus:ring-0 focus:border-l-indigo-500 dark:text-slate-50 lg:text-1xl sm:text-md"
                        style="" name="blogtitle" placeholder="Title" required></textarea>
                </div>
                <div class="flex justify-center">
                    <textarea
                        class="w-full rounded-lg p-3 mt-2 resize-y bg-inherit border-none outline-none focus:outline-none focus:border-none focus:ring-0 dark:text-slate-50 lg:text-1xl sm:text-md"
                        style="text-overflow:none" rows="18" name="blogcontent" placeholder="Content" required></textarea>
                </div>
                {{-- <div class="flex justify-center">
                    <input type="file" multiple id="blogfiles" name="blogfiles" class="w-full rounded-lg p-3 m-1">
                </div> --}}
                <div class="flex justify-center lg:justify-end sm:justify-center m-3">
                    <button type="button"
                        class="p-2 m-1 w-1/2 lg:w-1/5 sm:w-1/2 bg-indigo-500 dark:bg-indigo-500 rounded-lg"><span
                            class="dark:text-slate-100 text-slate-50 font-normal text-normal">Save As
                            Draft</span></button>
                    <button type="submit"
                        class="p-2 m-1 w-1/2 lg:w-1/5 sm:w-1/2 bg-indigo-500 dark:bg-indigo-500 rounded-lg"><span
                            class="dark:text-slate-100 text-slate-50 text-normal">Publish</span></button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
